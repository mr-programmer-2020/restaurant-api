<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;
use App\Models\Order;

class Table extends Model
{
    use HasFactory;

    protected $table = "tables";
    protected $fillable = [
        'serial_number',
        'restaurant_id',
        'quantity'
    ];

    public function restaurant(){
        $this->belongTo(Restaurant::class);
    }

    
}
