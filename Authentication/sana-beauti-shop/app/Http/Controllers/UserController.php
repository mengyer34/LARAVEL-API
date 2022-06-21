<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createAccount(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $token = $user->createToken('myToken')->plainTextToken;
        $response = [
            'user'=>$user,
            'token'=>$token
        ];
        return response()->json($response);
    }
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();
   
         if (!$user || !Hash::check($request->password, $user->password)) {
            return response('Login invalid', 503);
         }
   
         return $user->createToken($request->email)->plainTextToken;
    }
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return response()->json(['sms'=>'logged out']);
    }

    public function index(){
        return User::with(['post','comment'])->get();
        // return User::all();
    }
}
