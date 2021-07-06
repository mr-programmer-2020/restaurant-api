<?php
namespace App\Http\Repository;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Client;
use App\Models\Table; 

class RestaurantRepository 
{
    
    public static function addRestaurant(Request $request)
    {
        $restaurants = new Restaurant();

        $restaurants->restaurantName = $request->input('restaurant_name');
        $restaurants->restaurantAddress = $request->input('restaurant_address');
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

    public static function getOrders($id)
    {
        $orders = Client::where('restaurant_id',$id)->first();
        return response()->json($orders);
    }

    private static function getAllOrders()
    {
        $orders = Client::all();
        $orders = sizeof($orders);
        return $orders;
        
    }

    private static function getAllTabels()
    {
        $tabels =Table::select('quantity')->get();

        $usedTabels = 0;
        foreach($tabels as $tabel)
        {
            $usedTabels += $tabel['quantity'];
        }

        return $usedTabels;
    }

    public static function getTotalUsedTabels()
    {
        $usedTabels = self::getAllOrders();
        $allTabels  = self::getAllTabels();

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

    public static function getTotalFreeTabels()
    {
        $usedTabels = self::getAllOrders();
        $allTabels  = self::getAllTabels();

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

}