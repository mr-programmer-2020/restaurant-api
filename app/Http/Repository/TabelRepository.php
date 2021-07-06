<?php

namespace App\Http\Repository;
use Illuminate\Http\Request;
use App\Models\Table; 

class TabelRepository 
{
    public static function addTable(Request $request)
    {
        $tables = new Table();

        $tables->serialNumber = $request->input('serial_number');
        $tables->restaurant_id = $request->input('restaurant_id');
        $tables->quantity = $request->input('quantity');
        $result = $tables->save();

        if($result)
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
