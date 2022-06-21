<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function createAccount(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Token for login
        $token = $user->createToken('myToken')->plainTextToken;
        $response = [
            'user'=>$user,
            'token'=>$token,
        ];

        return response()->json($response);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password))
        {
            return response('Login Invalid pov!!!', 503);
        }
        return $user->createToken($request->email)->plainTextToken;
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json(['sms'=>'logged out']);
    }
}
