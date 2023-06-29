<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $primaryKey = 'id_offer';
    protected $fillable = [
        'name', 'image', 'description', 'link', 'status'
    ];

    // one voucher has many orders
    // public function orders(){
    //     return $this->hasMany(Order::class);
    // }
}
