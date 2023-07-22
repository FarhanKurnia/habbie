<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id_payment';
    protected $fillable = [
        'gross_amount', 'transaction_time','transaction_status', 'transaction_id','order_id','invoice_id'    
    ];

    // one payment has one order
    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }

    // one payment has one customer
    // public function user(){
    //     return $this->belongsTo(Customer::class, 'user_id');
    // }
}
