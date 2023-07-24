<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function callback(Request $request)
    {
        try {

            $order_id = $request->order_id;
            $status_code = $request->status_code;
            $gross_amount = $request->gross_amount;
            $transaction_status = $request->transaction_status;
            $transaction_id = $request->transaction_id;
            $transaction_time = $request->transaction_time;
            //code...
            Order::where('invoice', $order_id)->update([
                'status' => 'process',
            ]);

            $order = Order::where('invoice',$order_id)->get();
            // dd($request);
            Payment::create([
                'gross_amount' => $gross_amount, 
                'transaction_time' => $transaction_time,
                'transaction_status' => $transaction_status, 
                'transaction_id' => $transaction_id,
                'order_id' => null,
                'invoice_id' => $order_id
            ]);
            return response()->json(['order_id' => $order[0]['id_order']]);
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
