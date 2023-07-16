<?php

namespace App\Services\Midtrans;
use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans {
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->order['id'],
                'gross_amount' => $this->order['subtotal'],
            ],
            'item_details' => array_values($this->order['products']),
            'customer_details' => $this->order['customer']
            // sample data customer detail 
            // 'customer_details' => [
            //     'first_name' => 'Martin Mulyo Syahidin',
            //     'email' => 'mulyosyahidin95@gmail.com',
            //     'phone' => '081234567890',
                // "shipping_address": {
                //     "first_name": "TEST",
                //     "last_name": "MIDTRANSER",
                //     "email": "test@midtrans.com",
                //     "phone": "0 8128-75 7-9338",
                //     "address": "Sudirman",
                //     "city": "Jakarta",
                //     "postal_code": "12190",
                //     "country_code": "IDN"
                //   }
            // ]
        ];
        
        $snapToken = Snap::getSnapToken($params);
        return $snapToken;
    }
}
