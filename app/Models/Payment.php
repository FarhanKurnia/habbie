<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id_payment';
    protected $fillable = [
        'total', 'status', 'order_id','user_id'
    ];

    // one payment has one order
    public function order(){
        return $this->hasOne(Order::class, 'order_id');
    }

    // one payment has one customer
    public function user(){
        return $this->belongsTo(Customer::class, 'user_id');
    }
}
