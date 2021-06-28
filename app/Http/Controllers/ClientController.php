<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;
class ClientController extends Controller
{
 
    public function orderTable(Request $request)
    {
        $clients = new Client();

        $clients->firstName = $request->input('firstName');
        $clients->secondName = $request->input('secondName');
        $clients->phoneNumber = $request->input('phoneNumber');
        $clients->bookingTime = $request->input('bookingTime');
        $clients->restaurant_id = $request->input('restaurant_id');

        $checkSeve = $clients->save();

        if($checkSeve)
        {
            return response()->json([
                "message" => "client order created successfully"
            ], 201);
        }
        else
        {
            return response()->json([
                "message" => "client order not  created"
            ], 500);
        }
        

    }
}
