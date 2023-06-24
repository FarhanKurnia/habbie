<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'id_customer';
    protected $fillable = [
        'name', 'email', 'password', 'phone','address', 'membership','status','email_verified_at',
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // one customer has one cart
    public function cart(){
    	return $this->hasOne(Cart::class);
    }

}
