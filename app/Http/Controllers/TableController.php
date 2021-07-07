<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table; 
use App\Http\Repository\TabelRepository;

class TableController extends Controller
{
    public function addTable(Request $request)
    {
        $data = array();
        $data = $request->all();
        $result = TabelRepository::addTable($data);
        return $result;
    }
    
}
