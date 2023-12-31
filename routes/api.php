<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyAPI;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get("data",[dummyAPI::class,'getData']);
    Route::get("list/{id?}",[DeviceController::class,'list'])->whereNumber('id');
    Route::post("add",[DeviceController::class,'add']);
    Route::put("update",[DeviceController::class,'update']);
    Route::get("search/{name}",[DeviceController::class,'search']);
    Route::get("delete/{id?}",[DeviceController::class,'delete'])->whereNumber('id');
    Route::post("save",[DeviceController::class,'testData']);
    });





Route::post("login",[UserController::class,'index']);