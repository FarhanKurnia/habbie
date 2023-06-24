<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'name', 'category', 'image', 'description', 'price', 'stock', 'rating', 'discount_id'
    ];

    // many products owned by one cart
    public function cart(){
    	return $this->belongsTo(Product::class, 'product_id');
    }

    // many products owned by one order
    public function order(){
    	return $this->belongsTo(Product::class, 'product_id');
    }

    // many product owned by one discount
    public function discount(){
        return $this->belongsTo(Discount::class, 'discount_id');
        
    }
}
