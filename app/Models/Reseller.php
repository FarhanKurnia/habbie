<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    protected $table = 'resellers';
    protected $primaryKey = 'id_reseller';
    protected $fillable = [
        'name','reseller_id', 'email', 'gender', 'phone', 'birth_date', 'identity_card', 'status', 'address', 'province', 'city','subdistrict','postal_code'
    ];
}
