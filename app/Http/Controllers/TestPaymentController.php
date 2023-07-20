<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use App\Services\Midtrans\CallbackService;

class TestPaymentController extends Controller
{

    
    public function show($slug)
    {

        // query data order from db
        $order = Order::where([['invoice', $slug], ['status', 'pending']])->firstOrFail();
        $id_order = $order->id_order;
        $orderProducts = OrderProduct::where('order_id',$id_order)->with('order','product', 'product.discount')->get();
        
        // decode from json to array
        $order = json_decode($order, true);
        $orderProducts = json_decode($orderProducts, true);

        // map arryay
        $itemDetails = array_map(function ($item) {

            $price = $item['product']['price'];

            if($item['product']['discount']){
                $discount = $item['product']['discount']['rule'];
                $price = $price - (( $discount / 100 ) * $price );
            }

            return [
                'id' => $item['product']['id_product'],
                'name' => $item['product']['name'],
                'price' => $price,
                'quantity' => $item['qty']
            ];
        }, $orderProducts);
        

        $date = Carbon::now();
        $start_rand = rand(5000,99999);
        $end_rand = rand(5000,99999);
        $result = $date->format('Y-m-d');
        $result = explode('-', $result);
        $result = implode("", $result);
        $invoiceEncrypt = $start_rand.$result.$end_rand;

        array_push($itemDetails, [ 'id' => rand(1, 999), 'name' => $order['shipping_code'] . " " . $order['shipping_service'], 'quantity' => 1, 'price' => $order['shipping_value']]);
        
        // create payload 
        $payloadOrder = [
            'transaction_details' => [
                'order_id' => $order['invoice'],
                'gross_amount' => $order['sub_total']
            ],
            'item_details' => $itemDetails,
            // 'page_expiry' =>  [
            //     'duration' => 1,
            //     'unit' => 'hours'
            // ],
            'customer_details' => [
                'first_name' => $order['name'],
                'email' => $order['email'],
                'phone' => $order['phone'],
                'shipping_address' => [
                    'address' => $order['address'],
                    'city' => $order['city'],
                    'postal_code' => $order['postal_code'],
                    'country_code' => "IDN"
                ],
            ],
            'custom_field1' => "test"
        ];

        $orderStatus = $order['status'];

        $invoice = $order['invoice']; 
        $snapToken = Cookie::get($invoice);
        
        if(is_null($snapToken)){
            $midtrans = new CreateSnapTokenService($payloadOrder);
            $snapToken = $midtrans->getSnapToken();
            
            Cookie::queue(Cookie::make($invoice, $snapToken, 60));
        } 

        // dd($order, $orderProducts, $itemDetails);
        return view('pages.public.payment', compact('snapToken', 'order', 'orderStatus', 'orderProducts'));

    }

    public function callback(Request $request)
    {
        $serverKey = config('services.midtrans.serverKey');
        $order_id = $request->order_id;
        $status_code = $request->status_code;
        $gross_amount = $request->gross_amount;
        $transaction_status = $request->transaction_status;

        $hashed = hash("sha512", $order_id.$status_code.$gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($transaction_status == 'capture' || $transaction_status == 'settlement'){
                Order::where('invoice', $order_id)->update([
                    'status' => 'process',
                ]);
            }

            if($transaction_status == 'expire' || $transaction_status == 'cancel' || $transaction_status == 'deny'){
                Order::where('invoice', $order_id)->update([
                    'status' => 'failed',
                ]);

            }

        }
    }

}