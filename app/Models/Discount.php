<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';
    protected $primaryKey = 'id_discount';
    protected $fillable = [
        'name','slug','rule','description','status','deleted_at'
    ];

    // one discount has many products
    public function product(){
        return $this->hasMany(Product::class,'discount_id');
        
    }
}
