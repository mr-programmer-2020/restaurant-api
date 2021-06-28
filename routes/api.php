<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\EmployeeController;
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
Route::post("/add-employee",[EmployeeController::class,"addEmploee"]);

Route::post("/delete-order-by-manager/{employee_id}/{order-id}",[EmployeeController::class,"deleteOrderByManager"]);
Route::delete("/delete-order-by-employee/{employee_id}/{order_id}/{work_area_id}",[EmployeeController::class,"deleteOrderByEmployee"]);
