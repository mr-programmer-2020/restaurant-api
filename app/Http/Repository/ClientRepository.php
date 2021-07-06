<?php
namespace App\Http\Repository;
use Illuminate\Http\Request;  
use App\Models\Client;

class ClientRepository 
{
    public static function create(Request $request)
    {

        $clients = new Client();
    
        $clients->firstName = $request->input('first_name');
        $clients->secondName = $request->input('second_name');
        $clients->phoneNumber = $request->input('phone_number');

        $clients->save();
    }
}