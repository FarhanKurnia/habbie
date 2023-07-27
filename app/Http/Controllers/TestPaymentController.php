<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderProduct;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use App\Services\Midtrans\CallbackService;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Database\Eloquent\Casts\Json;

class TestPaymentController extends Controller
{

    
    public function show($slug)
    {

        // query data order from db
        $order = Order::where([['invoice', $slug], ['status', 'pending']])->firstOrFail();
        $id_order = $order->id_order;
        $orderProducts = OrderProduct::where('order_id',$id_order)->with('order','product')->get();
        
        // decode from json to array
        $order = json_decode($order, true);
        $orderProducts = json_decode($orderProducts, true);

        // map arryay
        $itemDetails = array_map(function ($item) {

            return [
                'id' => $item['product_id'],
                'name' => $item['product']['name'],
                'price' => $item['sub_total_price'],
                'quantity' => $item['qty']
            ];
        }, $orderProducts);
        

        // $date = Carbon::now();
        // $start_rand = rand(5000,99999);
        // $end_rand = rand(5000,99999);
        // $result = $date->format('Y-m-d');
        // $result = explode('-', $result);
        // $result = implode("", $result);
        // $invoiceEncrypt = $start_rand.$result.$end_rand;

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

        $invoice = strval($order['invoice']); 
        $snapToken = Cookie::get($invoice);
        
        if(is_null($snapToken)){
            $midtrans = new CreateSnapTokenService($payloadOrder);
            $snapToken = $midtrans->getSnapToken();
            
            Cookie::queue(Cookie::make($invoice, $snapToken, 60));
        } 

        // dd($order, $orderProducts, $itemDetails, $payloadOrder);
        return view('pages.public.payment', compact('snapToken', 'order', 'orderStatus', 'orderProducts', 'invoice'));

    }

    public function callback(Request $request)
    {
        try {
            $serverKey = config('services.midtrans.serverKey');
            $order_id = $request->order_id;
            $va_number = $request->va_numbers[0]['va_number'];
            $bank = $request->va_numbers[0]['bank'];
            $biller_code = $request->biller_code;
            $bill_key = $request->bill_key;
            $status_code = $request->status_code;
            $gross_amount = $request->gross_amount;
            $payment_type = $request->payment_type;
            $transaction_status = $request->transaction_status;
            $transaction_id = $request->transaction_id;
            $transaction_time = $request->transaction_time;
    
            $hashed = hash("sha512", $order_id.$status_code.$gross_amount.$serverKey);
            
            if($hashed == $request->signature_key){
    
                if($transaction_status == 'pending'){
                    Order::where('invoice', $order_id)->update([
                        'status' => 'pending',
                    ]);

                    return response()->json(['message' => 'Payment Status Pending']);
                }
    
                if($transaction_status == 'capture' || $transaction_status == 'settlement'){
                    $order = Order::where('invoice', $order_id)->get();
                    $order[0]->update([
                        'status' => 'process',
                    ]);
                    // $order = Order::where('invoice',$order_id)->get();
                    // handle VA BANK BCA, BNI ad Payment
                    // if (!empty($va_number)) {
                    if ($va_number) {
                        Payment::create([
                            'gross_amount' => $gross_amount, 
                            'va_number' => $va_number,
                            'bank' => $bank,
                            'payment_type' => $payment_type,
                            'transaction_time' => $transaction_time,
                            'transaction_status' => $transaction_status, 
                            'transaction_id' => $transaction_id,
                            'order_id' => $order[0]['id_order'],
                            'invoice_id' => $order_id
                        ]);
                      }else {
                        // handle Mandiri Bill Payment dan BANK Permata masih fail
                        Payment::create([
                            'gross_amount' => $gross_amount, 
                            'va_number' => $biller_code.$bill_key,
                            'bank' => 'mandiri',
                            'payment_type' => 'bill_payment',
                            'transaction_time' => $transaction_time,
                            'transaction_status' => $transaction_status, 
                            'transaction_id' => $transaction_id,
                            'order_id' => $order[0]['id_order'],
                            'invoice_id' => $order_id
                        ]);
                      }
                    // if($va_number){
                    //     Payment::create([
                    //         'gross_amount' => $gross_amount, 
                    //         'va_number' => $va_number,
                    //         'bank' => $bank,
                    //         'payment_type' => $payment_type,
                    //         'transaction_time' => $transaction_time,
                    //         'transaction_status' => $transaction_status, 
                    //         'transaction_id' => $transaction_id,
                    //         'order_id' => $order[0]['id_order'],
                    //         'invoice_id' => $order_id
                    //     ]);
                    // }
                    // if($biller_code){
                    //     $bank = "mandiri";
                    //     $payment_type = "bill_payment";
                    //     Payment::create([
                    //         'gross_amount' => $gross_amount, 
                    //         'va_number' => $biller_code.$bill_key,
                    //         'bank' => $bank,
                    //         'payment_type' => $payment_type,
                    //         'transaction_time' => $transaction_time,
                    //         'transaction_status' => $transaction_status, 
                    //         'transaction_id' => $transaction_id,
                    //         'order_id' => $order[0]['id_order'],
                    //         'invoice_id' => $order_id
                    //     ]);
                    // }
                    

                    return response()->json(['message' => 'Payment Status Success']);
                }
    
                if($transaction_status == 'expire' || $transaction_status == 'cancel' || $transaction_status == 'deny'){
                    // Order::where('invoice', $order_id)->update([
                    //     'status' => 'failed',
                    // ]);
                    $order = Order::where('invoice', $order_id)->get();
                    $order[0]->update([
                        'status' => 'failed',
                    ]);

                    return response()->json(['message' => 'Payment Status Failed']);    
                }
            }
        } catch(\Throwable $th){
            return $th;
        }

    }

}