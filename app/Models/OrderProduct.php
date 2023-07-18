<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';
    protected $primaryKey = 'id_order_product';
    protected $fillable = [
        'order_id', 'product_id','qty','price','total','sub_total','discount'
    ];

    // one order product has many orders
    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }

    // one payment has one customer
    // public function customer(){
    //     return $this->hasOne(Customer::class, 'customer_id');
    // }    
    
    // one order product has many products
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

}
