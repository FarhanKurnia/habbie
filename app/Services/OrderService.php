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

    public function create()
    {
        // dd($this->orderData);
        dd($this->generateInvoice());

    }
}