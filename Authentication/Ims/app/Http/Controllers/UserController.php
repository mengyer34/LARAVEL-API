<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request -> validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=>'required|confirmed',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['sms'=>'registered successfully!']);
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json(['message'=>'Invalid credentials'], 404);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24);
        return response()->json(['message'=>'successful login', 'token'=>$token], 200)
                                ->withCookie($cookie);
    }

    public function logout(Request $request)
    {
        $cookie = Cookie::forget('jwt');
        return response()->json(['sms'=>'logged out'])->withCookie($cookie);
    }
}
