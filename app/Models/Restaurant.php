<?php

namespace App\Models;

use App\Models\Table;
use App\Models\Employee;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $table = "restaurants";

    protected $fillable = [
        'restaurant_name',
        'restaurant_address',
    ];
    
    public function tables()
    {
        $this->hasMany(Table::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}

