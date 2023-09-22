<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermReseller extends Model
{
    protected $table = 'term_resellers';
    protected $primaryKey = 'id_term_reseller';
    protected $fillable = [
        'information','term','slug'
    ];
}
