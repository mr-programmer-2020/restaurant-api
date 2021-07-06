<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Client; 
use App\Models\Restaurant; 
use DB;
use App\Http\Repository\EmployeeRepository;

class EmployeeController extends Controller
{
    
    public function addEmployee(Request $request)
    {    
        $addEmployee = EmployeeRepository::addEmployee($request);
        return $addEmployee;
    }


    public function deleteOrderByManager($id,$order_id)
    {
        $deleteOrder = EmployeeRepository::deleteOrderByManager($id,$order_id);
        return $deleteOrder;
    }

   
    public function deleteOrderByEmployee($id,$work_place_id,$order_id)
    {
        $deleteOrder = EmployeeRepository::deleteOrderByEmployee($id,$work_place_id,$order_id);
        return $deleteOrder;
    }
 
   
}
