<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $table = 'visits';
    protected $fillable = ['inmate_id', 'visitor_name', 'visitor_phone', 'visitor_relation', 'created_by'];
}
