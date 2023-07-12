<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FormCheckout extends Component
{

    public $data;
    public $provinces;
    public $cities = [];
    public $subdistricts = [];
    public $couriers;
    public $costs = [];
    public $courierCode;
    public $address;
    public $postalCode;
    public $selectedProvince;
    public $selectedCity;
    public $selectedSubdistrict;
    public $selectedCourier;
    public $selectedCost;
    public $orderData;

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
        // map data citiest with specifi id
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

    public function updatedSelectedCourier($value)
    {
        $this->selectedCourier = $value;
        $this->checkOngkir();
        // dd($this->selectedCourier);
    }

    public function checkOngkir()
    {
        $apiUrl = env('RAJAONGKIR_URL');
        $apiKey = env('RAJAONGKIR_API_KEY');
        $originId = env('ORIGIN_LOCATION_ID');

        try {
            $response = Http::withHeaders([
                'key' => $apiKey
            ])->post($apiUrl . '/cost', [
                'origin' => $originId,
                'originType' => 'subdistrict',
                'destination' => json_decode($this->selectedSubdistrict, true)['id'],
                'destinationType' => 'subdistrict',
                'weight' => 1000,
                'courier' => strtolower($this->selectedCourier),
            ]);
    
            $data = $response->json();
            // $results = $data;
    
            $this->costs = $data;
            $this->emit('ongkir');
        } catch (\Exception $e) {
            Log::error('Error during API request: ' . $e->getMessage());
            // Handle or display the error as needed
        }
    }

    public function setOngkir()
    {
        $this->emit('setOngkir', json_decode($this->selectedCost));
        // dd();
    }

    public function submitOrder()
    {
        if(!!\Cart::getTotal()){
            $selectedCost = json_decode($this->selectedCost, true);
            $cartItems = \Cart::getContent();
    
            $cartTransformed = $cartItems->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ];
            });
    
            $this->orderData = [
                'products' => $cartTransformed,
                'customer' => [
                    'customer_id' => 12,
                    'email' => 'johndoe@mail.com',
                    'phone' => '6287654321009',
                    'address' => $this->address,
                    'province' => json_decode($this->selectedProvince, true)['name'],
                    'city' => json_decode($this->selectedCity, true)['name'],
                    'subdistrict' => json_decode($this->selectedSubdistrict, true)['name'],
                    'postal_code' => $this->postalCode
                ],
                'shipping' => $selectedCost,
                'subtototal' =>  \Cart::getTotal() + $selectedCost['value']
            ];
    
            $this->validate([
                'address' => 'required',
                'postal_code' => 'required'
            ]);

            $this->emit('createOrder', $this->orderData);
    
            // dd($this->orderData['products']);
        } else {
            $msg = 'Empty Cart, Process Failed.';

            $this->emit('showToast', $msg);
        }


    }

    public function mount()
    {
        $this->fetchData();
        $this->couriers = ['JNE', 'SICEPAT', 'JNT', 'ANTERAJA'];
        $this->selectedCourier = null;
        $this->selectedCost = null;
    }

    public function render()
    {
        // dd($this->provinces);
        // dd($this->cities);

        return view('livewire.form-checkout');
    }
}
