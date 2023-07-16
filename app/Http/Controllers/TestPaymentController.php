<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;

class TestPaymentController extends Controller
{

    // public $order;

    // public function __constructor()
    // {
    // }
    
    public function show()
    {

        // query data order from db

        // ambil order status

        // payload data order
        $order = [
            'id' => rand(14, 999),
            'subtotal' => \Cart::getTotal(),
            'products' => json_decode(\Cart::getContent(),true),
            'customer' => [
                    'first_name' => 'Martin Mulyo Syahidin',
                    'email' => 'mulyosyahidin95@gmail.com',
                    'phone' => '081234567890',
                    "shipping_address" => [
                        "first_name" => "TEST",
                        "last_name" => "MIDTRANSER",
                        "email" => "test@midtrans.com",
                        "phone" => "0 8128-75 7-9338",
                        "address" => "Sudirman",
                        "city" => "Jakarta",
                        "postal_code" => "12190",
                        "country_code" => "IDN"
                    ],
                ],
        ];
        // $order = $this->order;
        // dd($order);
        $snapToken = $order->snap_token ?? null;
        if(is_null($snapToken)){
            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();

            $order['snap_token'] = $snapToken;
        }

        return view('pages.public.payment', compact('snapToken'));
    }
}