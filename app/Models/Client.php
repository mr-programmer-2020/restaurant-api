<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = "clients";

    protected $fillable = [
        'first_name',
        'second_name',
        'phone_number'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
