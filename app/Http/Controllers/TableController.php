<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table; 
class TableController extends Controller
{
    public function addTable(Request $request)
    {
        $tables = new Table();

        $tables->serialNumber = $request->input('serialNumber');
        $tables->restaurant_id = $request->input('restaurant_id');
        $tables->quantity = $request->input('quantity');
        $result = $tables->save();

       

        if($tables)
        {
            return response()->json([
                "message" => "table created successfully"
            ], 201);
        }
        else
        {
            return response()->json([
                "message" => "table not created"
            ], 500);
        }
    }
}
