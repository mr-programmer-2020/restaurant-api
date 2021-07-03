<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TableController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' =>'web'],function(){


    Route::group(['prefix' => 'add'],function(){
    Route::post("client",[ClientController::class,"orderTable"]);
    Route::post("restauran",[RestaurantController::class,"addRestaurant"]);
    Route::post("employee",[EmployeeController::class,"addEmployee"]);
    Route::post("table",[TableController::class,"addTable"]);
    });
        
    Route::group(['prefix' => 'delete'],function(){
    Route::delete("manager/{id}/{order_id}",[EmployeeController::class,"deleteOrderByManager"]);
    Route::delete("employee/{id}/{work_area_id}/{order_id}",[EmployeeController::class,"deleteOrderByEmployee"]);
    });
        
    Route::group(['prefix' => 'get'],function(){
    Route::get("orders/{id}",[RestaurantController::class,"getOrders"]);
    Route::group(['prefix' => 'avarage'],function(){
    Route::get("used",[RestaurantController::class,"getTotalUsedTabels"]);
    Route::get("free",[RestaurantController::class,"getTotalFreeTabels"]);
    Route::get("full",[RestaurantController::class,"getFullActivity"]);
    });
    }); 


});



