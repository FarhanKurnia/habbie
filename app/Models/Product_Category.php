<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Category extends Model
{
    protected $table ='product_categories';
    protected $primaryKey = 'id_category';
    protected $fillable = [
        'name'
    ];

    // one category has many products
    public function product(){
        return $this->hasMany(Product::class,'category_id');
    }
}
