<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mockery\Undefined;

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


// Mission 5: GROUP ROUTE
Route::prefix('/user')->group(function(){
    // MESSION 2 GET ALL USERS
    Route::get('/', function(){
        global $users;
        return $users;
    });
    // MESSION 4 GET USER BY name
    Route::get('/{name}', function($name){
        global $users;
        foreach ($users as $user) {
            if($user['name']==$name){
                return $user;
            }
        }
        return 'Cannot find the user with index ' . $name;
    })->where('name', '[A-Za-z]+');

    // MESSION 3 GET USER BY INDEX
    Route::get('/{id}', function($id){
        global $users;
        if(sizeof($users)>$id){
            return $users[$id];
        }else{
            return 'Cannot find the user with index ' . $id;
        }
    })->where('id', '[0-9]+');
    Route::fallback(function(){
        return 'You can not get user line this!';
    });
    // Mission 6: GET POST
    Route::get('/{userIndex}/post/{postIndex}', function($userIndex, $postIndex){
        global $users;
        if(sizeof($users)>$userIndex && sizeof($users[$userIndex]['posts'])>$postIndex){
            return $users[$userIndex]['posts'][$postIndex];
        }else{
            return "Cannot find post with id $postIndex for user $userIndex";
        }
    })->where(['userIndex' =>'[0-9]+', 'postIndex'=> '[0-9]+']);
});





