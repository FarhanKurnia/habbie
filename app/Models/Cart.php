<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id_cart';
    protected $fillable = [
        'status', 'customer_id', 'product_id'
    ];

    // one cart owned by one customer
    public function customer(){
    	return $this->belongsTo(Customer::class,'customer_id');
    }

    // one cart has many products
    public function product(){
    	return $this->hasMany(Cart::class,'product_id');
    }
}
