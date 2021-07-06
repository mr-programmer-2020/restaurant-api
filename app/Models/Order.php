<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;
use App\Models\Table;
use App\Models\Client;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'table_id',
        'client_id',
        'booking_time',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function table()
    {
        return $this->belongsTo(Table::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
