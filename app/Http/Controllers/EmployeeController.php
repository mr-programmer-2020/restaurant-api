<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Client; 
use App\Models\Restaurant; 
use App\Models\Order; 
use DB;
use App\Http\Repository\EmployeeRepository;

class EmployeeController extends Controller
{
    
    public function addEmployee(Request $request)
    {  
        $data = array();
        $data = $request->all();  
        $addEmployee = EmployeeRepository::addEmployee($data);
        return $addEmployee;
    }


    public function deleteOrderByManager(Request $request)
    {
        $deleteOrder = EmployeeRepository::deleteOrderByManager($request->id,$request->restaurant_id);
        return $deleteOrder;
    }

   
    public function deleteOrderByEmployee(Request $request)
    {
        $deleteOrder = EmployeeRepository::deleteOrderByEmployee($request->id,$request->work_place_id,$request->restaurant_id);
        return $deleteOrder;
    }
 
   
}
