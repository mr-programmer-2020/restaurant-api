<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table; 
use App\Http\Repository\TabelRepository;

class TableController extends Controller
{
    public function addTable()
    {
        $addtable = TabelRepository::addTable();
        return $addTable;
    }
    
}
