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
    public static function create(array $data)
    {
        $order = new Order();
        
        $restaurant = new Restaurant();
        $table = new Table;
        $client = new Client();

        Order::create([
            'restaurant_id' => $data[$restaurant->orders()->save($order)],
            'table_id'      => $data[$table->orders()->save($order)],
            'client_id'     => $data[$client->orders()->save($order)],    
            'booking_time'  => $data['booking_time']

        ]);
        
    }

}

