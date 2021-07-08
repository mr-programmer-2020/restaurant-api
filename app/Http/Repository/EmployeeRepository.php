<?php
namespace App\Http\Repository;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Client; 
use App\Models\Restaurant; 
use DB;

class EmployeeRepository
{

    public static function addEmployee(array $data)
    {
      
        $employees =  Employee::create([
            'role'          => $data['role'],
            'first_name'    => $data['first_name'],
            'second_name'   => $data['second_name'],
            'work_place'    => $data['work_place'],
            'restaurant_id' => $data['restaurant_id']
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