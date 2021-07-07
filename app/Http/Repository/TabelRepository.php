<?php

namespace App\Http\Repository;
use Illuminate\Http\Request;
use App\Models\Table; 

class TabelRepository 
{
    public static function addTable(array $data)
    {
        $table =  Table::create([
            'serial_number'    => $data['serial_number'],
            'restaurant_id'    => $data['restaurant_id'],
            'quantity'         => $data['quantity'],
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
