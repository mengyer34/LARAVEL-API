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
        return Item::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item();
        $item->title = $request->title;
        $item->description = $request->description;
        $item->status = $request->status;

        $item->save();

        return response()->json(['message'=>'Item saved successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Method 1
        // $item = Item::find($id);
        // if(is_null($item)) {
        //     return response()->json('Data not found', 404);
        // }
        // return $item;

        // Method 2
        return Item::findOrFail($id);
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
        $item = item::findOrFail($id);
        $item->title = $request->title;
        $item->description = $request->description;
        $item->status = $request->status;

        $item->save();

        return response()->json(['message'=>'Item updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Item::destroy($id);
    }
}
