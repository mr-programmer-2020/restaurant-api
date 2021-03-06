<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\OrderRepository;  
use App\Http\Repository\ClientRepository;
use DB;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{

    public function create(OrderRequest $request)
    {
        try
        {
            $data = array();
            $data = $request->all();

            DB::beginTransaction();
            
            OrderRepository::create($data); 
            
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
     