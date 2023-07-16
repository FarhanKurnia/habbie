<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Data Dump
        $products = 
        [
            [
              "id" => 21,
              "name" => "Special Product buy 3 get 1",
              "quantity" => 1,
              "price" => 16000,
            ],
            [
              "id" => 19,
              "name" => "product 19",
              "quantity" => 1,
              "price" => 15000,
            ],
            [
              "id" => 20,
              "name" => "product 20",
              "quantity" => 2,
              "price" => 4000,
            ],
        ];

        $customer = [
            "customer_id" => 1,
            "name" => "John",
            "email" => "johndoe@mail.com",
            "phone" => "628786736847",
            "address" => "Karanggayam RT 07",
            "province" => "DI Yogyakarta",
            "city" => "Bantul",
            "subdistrict" => "Bantul",
            "postal_code" => "55711",
        ];

        $shipping = [
            "code" => "SICEPAT",
            "service" => "Gokil",
            "value" => 40000,
            "etd" => "2-3"
        ];

        $subtotal = 63000;

        // Invoice number
        $date = Carbon::now();
        $start_rand = rand(10000,99999);
        $end_rand = rand(10000,99999);
        $result = $date->format('Y-m-d');
        $result = explode('-', $result);
        $result = implode("", $result);
        $invoice = $start_rand.$result.$end_rand;

        // Data From Request
        // $products = $request['product'];
        // $customer = $request['customer'];
        // $shipping = $request['shipping'];
        // $subtotal = $request['subtotal'];

        $user = Auth::user();
        $id_user = $user->id_user;

        $order = Order::create([
            'name' => $customer['name'], 
            'email' => $customer['email'], 
            'phone' => $customer['phone'], 
            'address' => $customer['address'],
            'province' => $customer['province'],
            'city' => $customer['city'],
            'subdistrict' => $customer['subdistrict'],
            'postal_code' => $customer['postal_code'],
            'status' => 'pending', 
            'sub_total' => $subtotal,
            'shipping_code' => $shipping['code'], 
            'shipping_service' => $shipping['service'],
            'shipping_value' => $shipping['value'],
            'shipping_etd' => $shipping['etd'],  
            'invoice' => $invoice,
            'user_id' => $id_user, 
        ]);

        $id_order = $order->id_order;

        foreach($products as $product){
            OrderProduct::create([
                "order_id" => $id_order,
                "product_id" => $product['id'],
                "qty"=>$product['quantity'],
            ]);
        }  
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
