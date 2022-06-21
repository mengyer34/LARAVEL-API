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
        return  User::all();
    }

    public function user_category_product()
    {
        return  User::with(['category','product'])->get();
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

    public function register(Request $request)
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
        return User::find($id);
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
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->save();
        return response()->json(['message'=>'user updated successfully']);
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
        return $user;
    }
}
