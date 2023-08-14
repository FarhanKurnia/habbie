<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';
    protected $primaryKey = 'id_testimonial';
    protected $fillable = [
        'name','description','image','user_id','slug','profesi','lokasi','deleted_at'
    ];

    // many testimonials owned by one user
    public function user(){
        return $this->belongsTo(User::class,'user_id');
        
    }
}
