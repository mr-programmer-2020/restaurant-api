<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table; 
use App\Http\Repository\TabelRepository;
use App\Http\Requests\TableRequest;

class TableController extends Controller
{
    public function addTable(TableRequest $request)
    {
        $data = array();
        $data = $request->all();
        $result = TabelRepository::addTable($data);
        return $result;
    }
    
}
