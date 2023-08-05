<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Services\MembershipService;

class FormMembership extends Component
{
    public $data;
    public $provinces;
    public $cities = [];
    public $subdistricts = [];
    public $address;
    public $selectedProvince;
    public $selectedCity;
    public $selectedSubdistrict;
    public $name;
    public $selectedGender;
    public $identity_card;
    public $birth_date;
    public $email;
    public $phone;
    public $membershipData;
    public $postal_code;

    protected $rules = [
        'name' => 'required', 
        'email'=> 'required|email:rfc,dns', 
        'selectedGender'=> 'required', 
        'phone'=> 'required|min:10', 
        'birth_date'=> 'required', 
        'identity_card'=> 'required|unique:resellers|min:15', 
        'address'=> 'required', 
        'selectedProvince'=> 'required', 
        'selectedCity'=> 'required',
        'selectedSubdistrict'=> 'required',
        'postal_code'=> 'required|min:4',
    ];

    public function fetchData()
    {
        $apiUrl = env('RAJAONGKIR_URL');
        $apiKey = env('RAJAONGKIR_API_KEY');

        $data = Http::withHeaders([
            'key' => $apiKey
            ])->get( $apiUrl . '/city' )->json();

        $this->data = $data['rajaongkir']['results'];
        
        // extract data provinces
        $this->provinces = collect($this->data)->unique('province_id')->map(function ($item) {
            return [
                'province_id' => $item['province_id'],
                'province' => $item['province'],
            ];
        })->toArray();

    }

    public function updatedSelectedProvince($value)
    {
        $id = json_decode($value, true)['id'];

        // map data citiest with specific id
        $data = collect($this->data)
        ->where('province_id', $id)
        ->groupBy('province_id')
        ->map(function ($items) {
            $province = $items->first();
            return [
                'province_id' => $province['province_id'],
                'province' => $province['province'],
                'cities' => $items->map(function ($item) {
                    return [
                        'city_id' => $item['city_id'],
                        'city_name' => $item['city_name']
                    ];
                })->toArray(),
            ];
        })
        ->values()
        ->toArray();

        if(!empty($data)){
            $this->cities = $data[0]['cities'];
        } 

        $this->selectedCity = null;
        $this->selectedSubdistrict = null;

    }

    public function updatedSelectedCity($value)
    {
        $apiUrl = env('RAJAONGKIR_URL');
        $apiKey = env('RAJAONGKIR_API_KEY');
        $id = json_decode($value, true)['id'];
        
        $data = Http::withHeaders([
            'key' => $apiKey
            ])->withQueryParameters([
                'city' => $id
            ])->get( $apiUrl . '/subdistrict' )->json();
            
        $this->subdistricts = $data['rajaongkir']['results'];
        $this->selectedSubdistrict = null;
    }

    protected function resetInput()
    {
        $this->address = '';
        $this->selectedProvince = null;
        $this->selectedCity = null;
        $this->selectedSubdistrict = null;
        $this->name = '';
        $this->selectedGender = null;
        $this->identity_card = '';
        $this->birth_date = null;
        $this->email = '';
        $this->phone = '';
        $this->membershipData = '';
        $this->postal_code = '';
    }

    public function submitMembership()
    {
        $this->validate();
        $this->membershipData = [
            "name" => $this->name,
            "email" => $this->email,
            "gender" => $this->selectedGender,
            "phone" => $this->phone,
            "birth_date" => $this->birth_date,
            "identity_card" => $this->identity_card,
            "address" => $this->address,
            "province" => json_decode($this->selectedProvince, true)['name'],
            "city" => json_decode($this->selectedCity, true)['name'],
            "subdistrict" => json_decode($this->selectedSubdistrict, true)['name'],
            "postal_code" => $this->postal_code
        ];

        $newMember = new MembershipService($this->membershipData);
        $newMember->create();
    
        $this->resetInput();

        $msg = 'Data Membership Berhasil Dikirim, Sedang dikonfirmasi oleh Habbie';
        $this->emit('showToast', $msg);
        
        $this->emit('loadFlatPickr');
    }

    public function mount()
    {
        $this->fetchData();

    }

    public function render()
    {
        return view('livewire.form-membership');
    }
}
