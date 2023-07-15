<?php

namespace App\Services;

class Order {

    protected $orderData;

    public function __construct($data)
    {
        $this->orderData = $data;
    }

    public function createOrder()
    {
        dd($this->orderData);
    }
}