<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;

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
    public $phoneNumber;
    public $note;
    public $invoice;
    public $totalWeight;

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

    public function updatedSelectedCourier($value)
    {
        $this->selectedCourier = $value;
        $this->checkOngkir();
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
                'weight' => $this->totalWeight,
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
    }

    public function submitOrder()
    {
        if(!!\Cart::getTotal()){
            $user = Auth::user();

            $this->wrapperNote();

            $selectedCost = json_decode($this->selectedCost, true);
            $cartItems = \Cart::getContent();
    
            $cartTransformed = $cartItems->map(function ($item) {
                // $sub_total_price = $item->price - $item['attributes']->discount_price;
                $normal_price = $item->price + $item['attributes']->discount_price;
                // dd([
                //     'id' => $item->id,
                //     'name' => $item->name,
                //     'quantity' => $item->quantity,
                //     'discount_price' => $item['attributes']->discount_price,
                //     'discount_id' => $item['attributes']->discount_id,
                //     // 'price' => $item->price,
                //     'price' => $normal_price,
                //     // 'sub_total_price' => $sub_total_price,
                //     'sub_total_price' => $item->price,
                //     'total_price' => $item->price * $item->quantity
                // ]);
                
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'quantity' => $item->quantity,
                    'discount_price' => $item['attributes']->discount_price,
                    'discount_id' => $item['attributes']->discount_id,
                    // 'price' => $item->price,
                    'price' => $normal_price,
                    // 'sub_total_price' => $sub_total_price,
                    'sub_total_price' => $item->price,
                    'total_price' => $item->price * $item->quantity
                ];
            });
    
            $this->orderData = [
                'products' => array_values(json_decode($cartTransformed, true)),
                'customer' => [
                    'customer_id' => $user->id_user,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $this->phoneNumber,
                    'note' => $this->note,
                    'address' => $this->address,
                    'province' => json_decode($this->selectedProvince, true)['name'],
                    'city' => json_decode($this->selectedCity, true)['name'],
                    'subdistrict' => json_decode($this->selectedSubdistrict, true)['name'],
                    'postal_code' => $this->postalCode
                ],
                'shipping' => $selectedCost,
                'total_weight' => $this->totalWeight,
                'subtotal' =>  \Cart::getTotal()
            ];

            $this->validate([
                'address' => 'required|min:5',
                'postalCode' => 'required|min:4',
                'phoneNumber' => 'required|min:10',
                'selectedCost' => 'required'
            ]);

            $order = new OrderService($this->orderData);
            $invoice = $order->create();

            \Cart::clear();

            return redirect()->to('/payment/' . $invoice);

        } else {
            $msg = 'Empty Cart, Process Failed.';

            $this->emit('showToast', $msg);
        }


    }

    public function getTotalWeight()
    {
        if(!!\Cart::getTotal()){
            $cartItems = \Cart::getContent();
            $cartTransformed = $cartItems->map(function ($item) {
                $totalWeightItem = $item['attributes']['weight'] * $item['quantity'];
                $this->totalWeight += $totalWeightItem;
            });
        }
    
    }

    public function wrapperNote()
    {
        $preTag = "<pre>".$this->note."</pre>";
        $this->note = $preTag;
    }

    public function mount()
    {
        $this->fetchData();
        $this->getTotalWeight();
        $this->couriers = ['JNE', 'SICEPAT', 'JNT', 'ANTERAJA'];
        $this->selectedCourier = null;
        $this->selectedCost = null;

    }

    public function render()
    {
        return view('livewire.form-checkout');
    }
}
