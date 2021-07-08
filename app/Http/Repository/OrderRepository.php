<?php

namespace App\Http\Repository;
use Illuminate\Http\Request;  
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\Table;
use App\Models\Client;
class OrderRepository
{

    //not working yet problem with relation
    public static function create($booking_time)
    {
        $order = new Order();
        
        $restaurant = new Restaurant();
        $table = new Table;
        $client = new Client();

        Order::create([
            'restaurant_id' => $order->restaurant()->save($restaurant),
            'table_id'      => $order->table()->save($table),
            'client_id'     => $order->client()->save($client),
            'booking_time'  => $booking_time

        ]);
        
    }

}

