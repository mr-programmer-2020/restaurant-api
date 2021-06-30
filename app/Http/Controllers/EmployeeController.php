<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Client; 
use App\Models\Restaurant; 
use DB;
class EmployeeController extends Controller
{

    public function addEmployee(Request $request)
    {
        $employees = new Employee();

        $employees->role = $request->input('role');
        $employees->firstName = $request->input('firstName');
        $employees->secondName = $request->input('secondName');
        $employees->workPlace = $request->input('workPlace');
        $employees->restaurant_id = $request->input('restaurant_id');

        $checkSave = $employees->save();

        if($checkSave)
        {
            return response()->json([
                "message" => "employee created successfully"
            ], 201);
        }
        else
        {
            return response()->json([
                "message" => "employee not created"
            ], 500);
        }

    }





    public function deleteOrderByManager($id,$order_id)
    {

        $employee = Employee::findOrFail($id);
        if($employee->id == 1)
        {

            $result = DB::table('clients')->where('restaurant_id', $order_id)->delete();
            
            if($result)
            {
                
                return response()->json([
                    "message" => "employee deleted successfully"
                ], 201);
            }
            else
            {
                return response()->json([
                    "message" => "employee not deleted"
                ], 500);
            }
            
        }
        else
        {
            return response()->json([
                "message" => "employee not found"
            ], 500);
        }

    }

   
    public function deleteOrderByEmployee($id,$work_place_id,$order_id)
    {
        $employee = Employee::findOrFail($id);
        $employeeWorkPlace =  Restaurant::findOrFail($work_place_id);
   
        if($employee->id == 2)
        {

           if($employeeWorkPlace)
           {
              $result = DB::table('clients')->where('restaurant_id', $order_id)->delete();
              
               if($result)
               {
                    return response()->json([
                        "message" => "employee deleted successfully"
                    ], 201);
               }     
               else
               {
                    return response()->json([
                        "message" => "employee not deleted"
                    ], 500);
               }


            }
            else
            {
                return response()->json([
                    "message" => "employee work place not found"
                ], 500);
            }

            
        }
        else
        {
            return response()->json([
                "message" => "employee not found"
            ], 500);
        }


    }

    
   
}
