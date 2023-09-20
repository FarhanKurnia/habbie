<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $primaryKey = 'id_offer';
    protected $fillable = [
        'name','slug', 'image', 'description', 'product_id', 'status','deleted_at'
    ];

    protected $with = ['product'];


    // one offers has many products
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
