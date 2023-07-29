<?php

namespace App\Services;
use App\Models\Order;
use App\Models\OrderProduct;
use Carbon\Carbon;

class OrderService {

    protected $orderData;

    public function __construct($data)
    {
        $this->orderData = $data;
    }

    protected function generateInvoice()
    {
        $date = Carbon::now();
        $start_rand = rand(10000,99999);
        $end_rand = rand(10000,99999);
        $result = $date->format('Y-m-d');
        $result = explode('-', $result);
        $result = implode("", $result);
        $invoice = $start_rand.$result.$end_rand;

        return $invoice;
    }

    protected function insertOrder($orderData, $invoice)
    {
        $customer = $orderData['customer'];
        $shipping = $orderData['shipping'];
        $subtotal = $orderData['subtotal'];
        $totalWeight = $orderData['total_weight'];
        // $note = $orderData['note'];


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
            'total' => $subtotal + $shipping['value'],
            'shipping_code' => $shipping['code'], 
            'shipping_service' => $shipping['service'],
            'shipping_value' => $shipping['value'],
            'shipping_etd' => $shipping['etd'],  
            'invoice' => $invoice,
            'user_id' => $customer['customer_id'], 
            'total_weight' => $totalWeight,
            'note' => $customer['note'],
        ]);

        // dd($orderData, \Cart::getContent());

        $id_order = $order->id_order;

        return $id_order;
    }

    protected function insertOrderProduct($orderData, $orderId)
    {
        $products = collect($orderData['products']);
        
        // dd($orderData);

        $products->map(function ($item) use ($orderId) {

            OrderProduct::create([
                "order_id" => $orderId,
                "product_id" => $item['id'],
                "qty" => $item['quantity'],
                "price" => $item['price'],
                "discount_price" => $item['discount_price'],
                "discount_id" => $item['discount_id'],
                "sub_total_price" => $item['sub_total_price'],
                "total_price" => $item['total_price']
            ]);
        });
    }

    public function create()
    {
        $orderData = $this->orderData;
        $invoice = $this->generateInvoice();
        $orderId = $this->insertOrder($orderData, $invoice);

        $this->insertOrderProduct($orderData, $orderId);

        return $invoice;

    }
}