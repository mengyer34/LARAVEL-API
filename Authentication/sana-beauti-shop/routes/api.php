<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

Route::post('register', [UserController::class, 'createAccount']);
Route::post('login', [UserController::class, 'login']);

Route::group(['middleware'=> ['auth:sanctum']], function(){
    Route::apiResource('posts', PostController::class);
    Route::apiResource('comments', CommentController::class);
    Route::post('logout', [UserController::class, 'logout']);
    Route::get('users', [UserController::class, 'index']);
});
