<?php
namespace App\Http\Repository;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Client; 
use App\Models\Restaurant; 
use DB;

class EmployeeRepository
{

    public static function addEmployee($role,$first_name,$second_name,$work_place,$restaurant_id)
    {
      
        $employees =  Employee::create([
            'role'          => $role,
            'first_name'    => $first_name,
            'second_name'   => $second_name,
            'work_place'    => $work_place,
            'restaurant_id' => $restaurant_id
        ]);

        if($employees)
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

    public static function deleteOrderByManager($id,$restaurant_id)
    {

        $employee = Employee::where('role',1)->firstOrFail();
        if($employee)
        {

            $result = DB::table('orders')->where('restaurant_id', $restaurant_id)->delete();
            
            if($result)
            {
                
                return response()->json([
                    "message" => "order deleted successfully"
                ], 201);
            }
            else
            {
                return response()->json([
                    "message" => "order not deleted"
                ], 500);
            }
            
        }
        else
        {
            return response()->json([
                "message" => "order not found"
            ], 500);
        }

    }

    public static function deleteOrderByEmployee($id,$work_place_id,$restaurant_id)
    {
        $employee = Employee::where('role',2)->firstOrFail();
        $employeeWorkPlace =  Restaurant::findOrFail($work_place_id);
   
        if($employee)
        {

           if($employeeWorkPlace)
           {
              $result = DB::table('orders')->where('restaurant_id', $restaurant_id)->delete();
              
               if($result)
               {
                    return response()->json([
                        "message" => "order deleted successfully"
                    ], 201);
               }     
               else
               {
                    return response()->json([
                        "message" => "order not deleted"
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