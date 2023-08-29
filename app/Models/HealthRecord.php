<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    use HasFactory;

    protected $table = 'health_records';
    protected $fillable = ['inmate_id', 'disease_id', 'date_from', 'date_to', 'treatment_done', 'status', 'created_by'];
}
