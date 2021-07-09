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

    public static function deleteOrder($id)
    {    
        $result = DB::table('orders')->where('restaurant_id', $id)->delete();
            
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

    


}