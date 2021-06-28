<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";
    protected $fillable = [
        'role',
        'firstName',
        'secondName',
        'workPlace',
        'restaurant_id'
    ];

    
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    
}

