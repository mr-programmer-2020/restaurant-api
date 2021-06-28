<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rstaurant_Table extends Model
{
    use HasFactory;

    protected $table = "rstaurant__tables";
    protected $fillable = [
        'restaurant_id',
        'table_id',
    ];
}