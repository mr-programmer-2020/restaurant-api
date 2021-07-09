<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
/*
| API Routes
|--------------------------------------------------------------------------
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



// public routes
Route::post("register",[UserController::class,'register']); 
Route::post("login",[UserController::class,'login']); 

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::group(['prefix' => 'add'],function(){
        Route::post('orders/clients',[OrderController::class, 'create']);
        Route::post("restauran",[RestaurantController::class,"addRestaurant"]);
        Route::post("employee",[EmployeeController::class,"addEmployee"]);
        Route::post("table",[TableController::class,"addTable"]);
    });
        
    Route::group(['prefix' => 'delete'],function(){
        Route::delete("order/{id}/",[EmployeeController::class,"deleteOrder"]); 
    });
        
    Route::group(['prefix' => 'get'],function(){ 
        Route::get("orders/{id}",[RestaurantController::class,"getAllOrders"]);
        Route::group(['prefix' => 'avarage'],function(){
            Route::get("used",[RestaurantController::class,"getTotalUsedTabels"]);
            Route::get("free",[RestaurantController::class,"getTotalFreeTabels"]);
        });
    });

    Route::post("logout",[UserController::class,'logout']); 
});
