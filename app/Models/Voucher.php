<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';
    protected $primaryKey = 'id_voucher';
    protected $fillable = [
        'name', 'code', 'image', 'description', 'rule', 'status'
    ];

    // one voucher has many orders
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
