<?php

namespace App\Http\Repository;
use Illuminate\Http\Request;  
use App\Models\Order;

class OrderRepository
{

    public static function create(Request $request)
    {
        $orders = new Order();
    
        $orders->restaurant_id = $request->input('restaurant_id');
        $orders->table_id = $request->input('table_id');
        $orders->client_id = $request->input('client_id');
        $orders->booking_time = $request->input('booking_time');
        
        $orders->save();
        
    }

}