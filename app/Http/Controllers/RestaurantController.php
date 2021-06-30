<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Client; 
use App\Models\Table; 
class RestaurantController extends Controller
{
    
    public function addRestaurant(Request $request)
    {
        $restaurants = new Restaurant();

        $restaurants->restaurantName = $request->input('restaurantName');
        $restaurants->restaurantAddress = $request->input('restaurantAddress');
        $checkSave = $restaurants->save();

       

        if($checkSave)
        {
            return response()->json([
                "message" => "restaurant created successfully"
            ], 201);
        }
        else
        {
            return response()->json([
                "message" => "restaurant not created"
            ], 500);
        }

    }

    public function getOrders($id)
    {
        $orders = Client::where('restaurant_id',$id)->first();
        return response()->json($orders);
    }

    public function getAlltOrders()
    {
        $orders = Client::all();
        $orders = sizeof($orders);
        return $orders;
        
    }

    public function getAllTabels()
    {
        $tabels =Table::select('quantity')->get();

        $usedTabels = 0;
        foreach($tabels as $tabel)
        {
            $usedTabels += $tabel['quantity'];
        }

        return $usedTabels;
    }

    public function getTotalUsedTabels()
    {
        $usedTabels = $this->geAlltOrders();
        $allTabels = $this->getAllTabels();

        $usedAvarage = ($usedTabels / $allTabels) * 100 . " %";
        
        if($usedAvarage)
        {
            return response()->json($usedAvarage);
        }
        else
        {
            return response()->json([
                "message" => "table not created"
            ], 500);
        }

        
    }

    public function getTotalFreeTabels()
    {
        $usedTabels = $this->geAlltOrders();
        $allTabels = $this->getAllTabels();

        $freeTables = $allTabels - $usedTabels;

        $usedAvarage = ($freeTables / $allTabels) * 100 . " %";
        
        if($usedAvarage)
        {
            return response()->json($usedAvarage);
        }
        else
        {
            return response()->json([
                "message" => "table not created"
            ], 500);
        }

        
    }

    public function getFullActivity()
    {
        $used = $this->getTotalUsedTabels();
        $free = $this->getTotalFreeTabels();

      //  $fullActivity = $free - $used;

        $fullActivityAvarage = ($free / $used) * 100 . " %";
        
        if($fullActivityAvarage)
        {
            return response()->json($fullActivityAvarage);
        }
        else
        {
            return response()->json([
                "message" => "table not created"
            ], 500);
        }

        
    }

 
}


