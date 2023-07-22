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
            //code...
            Order::where('invoice', $request->order_id)->update([
                'status' => 'process',
            ]);
            // dd($request);
            Payment::create([
                'gross_amount' => $request->gross_amount, 
                'transaction_time' => $request->transaction_time,
                'transaction_status' => $request->transaction_status, 
                'transaction_id' => $request->transaction_id,
                'order_id' => null,
                'invoice_id' => $request->order_id
            ]);
            return "aman aja";
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
