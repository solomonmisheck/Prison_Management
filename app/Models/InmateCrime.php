<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InmateCrime extends Model
{
    use HasFactory;

    protected $table = 'inmates_crimes';

    protected $fillable = ['inmate_id','crime_id', 'created_by'];
}
