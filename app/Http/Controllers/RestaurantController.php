<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Client; 
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

}
