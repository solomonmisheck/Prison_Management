<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmate extends Model
{
    use HasFactory;
    protected $table = 'inmates';

    protected $fillable = [
        'code',
        'firstname', 
        'middlename', 
        'lastname', 
        'gender', 
        'dob', 
        'address', 
        'education_level', 
        'cell_block_id', 
        'sentence', 
        'date_from', 
        'date_to', 
        'contact_name', 
        'contact_phone', 
        'contact_relation', 
        'image', 
        'created_by',
        'offence',
        'judgement',
        'court',
        'virdict',
        'date_of_judgemet',
        'id_number'
    ];
}
