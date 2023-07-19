<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    protected $fillable = [
        'name', 'email', 'phone', 'address','province','city','subdistrict',
        'postal_code', 'status', 'sub_total', 'resi', 'user_id','shipping_code',
        'shipping_service','shipping_value','shipping_etd','invoice', 'total',
    ];

    // one order has many products
    // public function product(){
    // 	return $this->hasMany(Product::class, 'product_id');
    // }

    // one order owned by one payment
    public function payment(){
        return $this->belongsTo(Payment::class, 'order_id');
    }

    // one order owned by one payment
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // many orders owned by one voucher
    // public function voucher(){
    //     return $this->belongsTo(Voucher::class,'voucher_id');
    // }

    // one order has many order product
    public function orderproduct(){
        return $this->belongsTo(OrderProduct::class, 'order_id');
    }
}
