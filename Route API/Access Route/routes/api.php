<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// LINK CONTROLLERS FORM CONTROLLERS FOLDER
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;


Route::get('/items', [PostController::class, 'getAllItems']);

Route::get('/items/{id}', [PostController::class, 'getOneItem']);

Route::post('/items', [PostController::class, 'createItem']);

Route::delete('/items/{id}', [PostController::class, 'deleteItem']);

Route::put('/items/{id}', [PostController::class, 'updateItem']);

Route::get('tasks', [TaskController::class, 'index']);
Route::post('tasks', [TaskController::class, 'store']);