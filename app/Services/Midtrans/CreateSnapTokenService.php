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
            // 'item_details' => $this->order['products'],
            // sample data item_details:
            'item_details' => [
                [
                    'id' => 1,
                    'price' => '150000',
                    'quantity' => 1,
                    'name' => 'Flashdisk Toshiba 32GB',
                ],
                [
                    'id' => 2,
                    'price' => '60000',
                    'quantity' => 2,
                    'name' => 'Memory Card VGEN 4GB',
                ],
            ],

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
