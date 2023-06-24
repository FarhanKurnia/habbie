<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id_review';
    protected $fillable = [
        'name', 'rating', 'review', 'user_id'
    ];

    // many reviews owned by one user
    public function user(){
        return $this->belongsTo(User::class,'user_id');
        
    }
}
