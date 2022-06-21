<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::with(['items', 'category'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name'=>'required',
            'password'=>'required',
            'email'=>'required|email|unique:users',
        ]);
        User::create($request->all());
        return response()->json(['message'=>'user created successfully']);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(!empty($user)){
            return $user;
        }
        return response()->json(['sms'=>'user not found!!!!!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'name'=>'required',
            'password'=>'required',
            'email'=>'required|email|unique:users',
        ]);
        $user = User::find($id);
        if(!empty($user)){
            // $user->save();
            $user->name = $request->name;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->save();
            return response()->json(['message'=>'user updated successfully']);
        }
        return response()->json(['message'=>'user can not updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(!empty($user)){
            $user->delete();
            return response()->json(['sms'=>'deleted successfully']);
        }
        return response()->json(['sms'=>'User can not found!!']);
    }
}
