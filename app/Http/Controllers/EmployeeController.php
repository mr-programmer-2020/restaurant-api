<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Client; 
use App\Models\Restaurant; 
use App\Models\Order; 
use DB;
use App\Http\Repository\EmployeeRepository;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    
    public function addEmployee(EmployeeRequest $request)
    {  
        $data = array();
        $data = $request->all();  
        $addEmployee = EmployeeRepository::addEmployee($data);
        return $addEmployee;
    }


    public function deleteOrder(EmployeeRequest $request)
    {
        $deleteOrder = EmployeeRepository::deleteOrder($request->id);
        return $deleteOrder;
    }
   
}
