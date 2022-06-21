<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::with(['user','category'])->get();
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
                'category_id'=>'required',
                'name'=>'required',
                'price'=>'required',
                'user_id'=>'required',
            ]
        );
        Item::create($request->all());
        return response()->json(['message'=>'item created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        if(!empty($item)){
            return $item;
        }
        return response()->json(['sms'=>'item not found!!!!!']);
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
            'category_id'=>'required',
            'name'=>'required',
            'price'=>'required',
            'user_id'=>'required',
        ]);
        $item = Item::find($id);
        if(!empty($item)){
            // $user->save();
            $item->category_id = $request->category_id;
            $item->name = $request->name;
            $item->price = $request->price;
            $item->user_id = $request->user_id;
            $item->save();
            return response()->json(['message'=>'item updated successfully']);
        }
        return response()->json(['message'=>'item can not updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if(!empty($item)){
            $item->delete();
            return response()->json(['sms'=>'deleted successfully']);
        }
        return response()->json(['sms'=>'User can not found!!']);
    }
}
