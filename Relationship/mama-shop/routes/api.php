<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Models\Product;

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


Route::apiResource('users', UserController::class);
Route::get('users_category_product', [UserController::class, 'user_category_product']);


Route::apiResource('products', ProductController::class);
Route::get('product_category', [ProductController::class, 'product_category']);

Route::apiResource('categories', CategoryController::class);
Route::get('category_product', [CategoryController::class, 'category_product']);
Route::get('count_product', [CategoryController::class, 'count_product']);
