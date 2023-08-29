<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    use HasFactory;
    
    protected $table = 'crimes';
    
    protected $fillable = [
        'name','created_by','description'
    ];
}
