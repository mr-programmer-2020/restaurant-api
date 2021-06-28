<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Client; 
use App\Models\Restaurant; 
class EmployeeController extends Controller
{

    public function addEmploee(Request $request)
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

    //this function not working well yet
    public function deleteOrderByManager($id,$order_id)
    {
        
        $employee = Employee::findOrFail($id);

        $client =  Client::select('restaurant_id')->where('restaurant_id', $order_id)->first();

        if($employee->id == 1)
        {

           
            $result = $client->delete();
           

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
    
    //this function not working well yet
    public function deleteOrderByEmployee($id,$order_id,$work_place_id)
    {
        $employee = Employee::findOrFail($id);
        $client =  Client::select('restaurant_id')->where('restaurant_id', $order_id)->first();
        $employeeWorkPlace =  Restaurant::select('id')->where('id', $work_place_id)->first();

        if($employee->id == 2)
        {

           if($employeeWorkPlace)
           {
               $result = $client->delete(); 
               
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
