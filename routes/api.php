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


Route::post("/add-client",[ClientController::class,"orderTable"]);
Route::post("/add-restauran",[RestaurantController::class,"addRestaurant"]);
Route::post("/add-employee",[EmployeeController::class,"addEmployee"]);
Route::post("/add-table",[TableController::class,"addTable"]);

Route::delete("/delete-order-by-manager/{employee_id}/{order-id}",[EmployeeController::class,"deleteOrderByManager"]);
Route::delete("/delete-order-by-employee/{employee_id}/{order_id}/{work_area_id}",[EmployeeController::class,"deleteOrderByEmployee"]);

Route::get("/get-orders/{id}",[RestaurantController::class,"getOrders"]);
Route::get("get-used-avarage",[RestaurantController::class,"getTotalUsedTabels"]);
Route::get("get-free-avarage",[RestaurantController::class,"getTotalFreeTabels"]);
Route::get("full-avarage",[RestaurantController::class,"getFullActivity"]);
