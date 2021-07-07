<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Client; 
use App\Models\Table;    
use App\Http\Repository\RestaurantRepository;

class RestaurantController extends Controller
{
    
    public function addRestaurant(Request $request)
    {
        $data = array();
        $data = $request->all();
        $addRestaurant = RestaurantRepository::addRestaurant($data);  
        return $addRestaurant;
    }

    public function getAllOrders(Request $request)
    {
        $getOrders = RestaurantRepository::getOrders($request->id);
        return $getOrders;
    }



    public function getTotalUsedTabels()
    {
       $usedTabels = RestaurantRepository::getTotalUsedTabels();
        return $usedTabels;
    }

    public function getTotalFreeTabels()
    {
        $freeTabels = RestaurantRepository::getTotalFreeTabels();
        return $freeTabels;
    }
 
}


