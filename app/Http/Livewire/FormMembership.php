<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class FormMembership extends Component
{
    public $provinces;
    public $cities = [];
    public $subdistricts = [];
    public $address;
    public $selectedProvince;
    public $selectedCity;
    public $selectedSubdistrict;
    public $name;
    public $selectedGender;
    public $ktp;
    public $ttl;
    public $email;
    public $phoneNumber;
    public $membershipData;

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

    public function submitMembership()
    {
        $this->membershipData = [
            "name" => $this->name,
            "email" => $this->email,
            "gender" => $this->selectedGender,
            "phoneNumber" => $this->phoneNumber,
            "ttl" => $this->ttl,
            "ktp" => $this->ktp,
            "address" => $this->address,
            "province" => json_decode($this->selectedProvince, true)['name'],
            "city" => json_decode($this->selectedCity, true)['name'],
            "subdistrict" => json_decode($this->selectedSubdistrict, true)['name']
        ];

        dd($this->membershipData);
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
