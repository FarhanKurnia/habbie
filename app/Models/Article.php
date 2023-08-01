<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id_article';
    protected $fillable = [
        'title', 'post','excerpt', 'image', 'slug','deleted_at','categories','user_id'
    ];

    // many articles owned by one user
    public function user(){
        return $this->belongsTo(User::class,'user_id');
        
    }
}
