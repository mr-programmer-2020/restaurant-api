<?php
namespace App\Http\Repository;
use Illuminate\Http\Request;  
use App\Models\Client;

class ClientRepository 
{
    public static function create($first_name,$second_name,$phone_number)
    {

        $clients =  Client::create([
            'first_name' => $first_name,
            'second_name' => $second_name,
            'phone_number' => $phone_number
        ]);
    }
}