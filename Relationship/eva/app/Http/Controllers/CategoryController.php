<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate(
            [
                'name'=>'required',
                'user_id'=>'required',
            ]
        );
        Category::create($request->all());
        return response()->json(['message'=>'category created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if(!empty($category)){
            return $category;
        }
        return response()->json(['sms'=>'category not found!!!!!']);
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
            'user_id'=>'required',
        ]);
        $category = Category::find($id);
        if(!empty($category)){
            // $user->save();
            $category->name = $request->name;
            $category->user_id = $request->user_id;
            $category->save();
            return response()->json(['message'=>'category updated successfully']);
        }
        return response()->json(['message'=>'category can not updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(!empty($category)){
            $category->delete();
            return response()->json(['sms'=>'deleted successfully']);
        }
        return response()->json(['sms'=>'category can not found!!']);
    }
}
