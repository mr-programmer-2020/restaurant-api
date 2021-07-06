<?php

namespace App\Http\Repository;
use Illuminate\Http\Request;
use App\Models\Table; 

class TabelRepository 
{
    public static function addTable($serial_number,$restaurant_id,$quantity)
    {
        $table =  Table::create([
            'serial_number'    => $serial_number,
            'restaurant_id'    => $restaurant_id,
            'quantity'         => $quantity,
        ]);

        if($table)
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
