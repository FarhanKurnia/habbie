<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'name', 'category_id', 'image', 'description', 'price', 'stock', 'rating', 'weight', 'discount_id', 'slug','deleted_at'
    ];

    // many products owned by one order
    // public function order(){
    // 	return $this->belongsTo(Product::class, 'product_id');
    // }

    // many product owned by one discount
    public function discount(): BelongsTo{
        return $this->belongsTo(Discount::class, 'discount_id');
        
    }

    // many product owned by one catergory
    public function category(): BelongsTo{
        return $this->belongsTo(Product_Category::class,'category_id');
    }

    // one order has many order product
    public function orderproduct(){
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

    // one product has one offer
    public function offer(){
        return $this->hasMany(Offer::class, 'offer_id');
    }

    // one product has one body recommendation
    public function bodyrecommendation(){
        return $this->hasMany(Body_Recommendation::class, 'body_recommendation_id');
    }

}
