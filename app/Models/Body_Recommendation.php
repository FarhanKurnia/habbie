<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Body_Recommendation extends Model
{
    protected $table = 'body_recommendations';
    protected $primaryKey = 'id_body_recommendation';
    protected $fillable = [
        'name','image', 'description', 'product_id','deleted_at'
    ];

    // one body recommendation has many products
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
