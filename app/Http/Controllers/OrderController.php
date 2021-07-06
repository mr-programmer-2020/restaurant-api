<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\OrderRepository;  
use App\Http\Repository\ClientRepository;
use DB;

class OrderController extends Controller
{

    public function create(Request $request)
    {
        try
        {
            DB::beginTransaction();
            
            OrderRepository::create($request->restaurant_id,$request->table_id,$request->client_id,$request->booking_time); 
            ClientRepository::create($request->first_name,$request->second_name,$request->phone_number);
            DB::commit(); 
            return response()->json("order created successfully");
        }
        catch(\Exeption $exeption)  
        {
            DB::rollback();
        }
    }
}
     