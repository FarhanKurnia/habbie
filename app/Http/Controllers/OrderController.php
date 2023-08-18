<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display all listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('test.admin.order.index-order-admin',compact('orders'));
    }

    /**
     * Display a listing of the resource by status_order: order, process, cancel, failed and done.
     */
    public function indexStatusOrders($status)
    {
        $orders = Order::where('status_order',$status)->paginate(10);
        return view('test.admin.order.index-order-status-admin',compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editResi($invoice)
    {
        //categories
        $order = Order::where([['invoice',$invoice],['status_order','process']])->with('user','payment','orderproduct')->firstOrFail();
        return view('test.admin.order.edit-resi-order-admin',compact('order'));
    }

    /**
     * update the form for editing the specified resource.
     */
    public function updateResi(Request $request,$invoice)
    {
        $request->validate([
            'resi' => 'required'
        ]);
        //categories
        $order = Order::where([['invoice',$invoice],['status_order','process']])->firstOrFail();
        $order->update([
            'status_order' => 'done',
            'resi' => $request->resi,
        ]);

        if ($order) {
            return redirect()
                ->route('indexStatusOrders', $order['status_order'])
                ->with([
                    'success' => 'Resi has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
        
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
              "discount"=>16000,
              "price" => 80000,
              "discount_id" => 1
            ],
            [
              "id" => 19,
              "name" => "product 19",
              "quantity" => 1,
              "discount"=>0,
              "price" => 30000,
              "discount_id" => null
            ],
            [
              "id" => 20,
              "name" => "product 20",
              "quantity" => 2,
              "discount"=>0,
              "price" => 60000,
              "discount_id" => null
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

        // $subtotal = 170000;
        $subtotal = 227000;

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
            'total'=> $shipping['value']+$subtotal,
            'user_id' => $id_user, 
        ]);

        $id_order = $order->id_order;

        foreach($products as $product){
            OrderProduct::create([
                "order_id" => $id_order,
                "product_id" => $product['id'],
                "discount_id" => $product['discount_id'],
                "price" => $product['price'],
                "discount_price"=> $product['discount'],
                "sub_total_price"=> $product['price']-$product['discount'],
                "total_price" => ($product['price']-$product['discount'])*$product['quantity'],
                "qty"=>$product['quantity'],
            ]);
        }  
    }

    public function getOrder($invoice){
        $order = Order::where([['invoice',$invoice],['status','!=','failed']])->firstOrFail();
        $id_order = $order->id_order;
        $orderProducts = OrderProduct::where('order_id',$id_order)->with('order','product')->get();
        return view('test.customer.order.order-payment-client',compact('orderProducts'));
    }

    /**
     * Display the specified resource.
     */
    public function show($invoice)
    {
        $order = Order::where('invoice',$invoice)->with('user','payment','orderproduct')->firstOrFail();
        $payments = Payment::where('invoice_id',$invoice)->orderBy('created_at','DESC')->get();
        return view ('test.admin.order.show-order-admin',compact('order','payments'));
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
