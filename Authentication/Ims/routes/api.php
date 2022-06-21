<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);


Route::group(['middleware'=> ['auth:sanctum']], function(){
    Route::post('logout', [UserController::class, 'logout']);
    Route::apiResource('staff', StaffController::class);
});




