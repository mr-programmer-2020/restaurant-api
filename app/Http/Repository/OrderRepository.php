<?php

namespace App\Http\Repository;
use Illuminate\Http\Request;  
use App\Models\Order;
use App\Models\Restaurant;

class OrderRepository
{
    
    public static function create($restaurant_id,$table_id,$client_id,$booking_time)
    {
        $order = new Order();
        $restaurant = new Restaurant();
        Order::create([
            'restaurant_id' => $order->restaurant->save($restaurant),
            'table_id'      => $table_id,
            'client_id'     => $client_id,
            'booking_time'  => $booking_time

        ]);
        
    }

}

