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
            
            OrderRepository::create($request->booking_time); 
            $data = array();
            $data = $request->all();
            ClientRepository::create($data);
            DB::commit(); 
            return response()->json("order created successfully");
        }
        catch(\Exeption $exeption)  
        {
            DB::rollback();
        }
    }
}
     