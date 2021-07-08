<?php
namespace App\Http\Repository;
use Illuminate\Http\Request;  
use App\Models\Client;

class ClientRepository 
{
    public static function create(array $data)
    {

        $clients =  Client::create([
            'first_name'   => $data['first_name'],
            'second_name'  => $data['second_name'],
            'phone_number' => $data['phone_number']
        ]);
    }
}