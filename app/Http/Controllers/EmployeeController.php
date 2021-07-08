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


    public function deleteOrderByManager(EmployeeRequest $request)
    {
        $deleteOrder = EmployeeRepository::deleteOrderByManager($request->id);
        return $deleteOrder;
    }

   
    public function deleteOrderByEmployee(EmployeeRequest $request)
    {
        $deleteOrder = EmployeeRepository::deleteOrderByEmployee($request->id);
        return $deleteOrder;
    }
 
   
}
