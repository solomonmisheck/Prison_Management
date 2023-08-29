<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CellBlock extends Model
{
    use HasFactory;

    protected $table = 'cell_blocks';

    protected $fillable = [
        'name', 'created_by','description'
    ];
}
