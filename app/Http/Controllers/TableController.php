<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table; 
use App\Http\Repository\TabelRepository;

class TableController extends Controller
{
    public function addTable(Request $request)
    {
        $result = TabelRepository::addTable($request->serial_number,$request->restaurant_id,$request->quantity);
        return $result;
    }
    
}
