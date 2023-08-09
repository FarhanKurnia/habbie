<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id_role';
    protected $fillable = [
        'name',
    ];

    // one role owned by many user
    public function user(){
        return $this->hasMany(User::class,'user_id');
        
    }
}
