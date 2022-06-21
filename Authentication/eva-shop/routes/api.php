<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Handler\Proxy;

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


Route::post('register', [UserController::class, 'createAccount']);
Route::post('login', [UserController::class, 'login']);

Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('logout', [UserController::class, 'logout']);
    Route::apiResource('products', ProductController::class);
});