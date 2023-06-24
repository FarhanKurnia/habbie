<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'status', 'total', 'resi', 'customer_id', 'product_id'
    ];

    // many orders owned by one customer
    public function customer(){
    	return $this->belongsTo(Cart::class, 'customer_id');
    }

    // one order has many products
    public function product(){
    	return $this->hasMany(Product::class, 'product_id');
    }

    // one order owned by one payment
    public function payment(){
        return $this->belongsTo(Payment::class, 'order_id');
    }
}
