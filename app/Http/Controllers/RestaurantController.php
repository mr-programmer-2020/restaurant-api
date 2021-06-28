<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
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

}
