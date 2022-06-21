<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// MESSION 1
Route::get('/user', function () {
    global $users;
    $name = '';
    $message = 'The users are: ';
    foreach ($users as $user) {
        $name .= $user['name'] . ', ';
    }
    return $message . $name;
});

