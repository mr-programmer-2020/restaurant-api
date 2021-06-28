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
        $restaurants->save();
        
        return response()->json([
            "message" => "restaurant created successfully"
        ], 201);

    }
}
