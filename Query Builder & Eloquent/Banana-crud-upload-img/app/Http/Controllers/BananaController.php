<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banana;

class BananaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Banana::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Banana();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->status = $request->status;
        $item->image = $request->image;

        $path = public_path('images');
        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('image');
        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $item->image = $fileName;
        $item->save();
        $file->move($path, $fileName);

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
        $item =  Banana::where('id','=', $id)->get();
        if(count($item) <= 0){
            return response()->json(['message'=>'Item not found!!']);
        }else {
            return response()->json(Banana::findOrFail($id));
        }
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
        $item = Banana::findOrFail($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->status = $request->status;

        $currentPhoto = Banana::find($id)->image;  //fecthing user current photo
        if($request->image != $currentPhoto){  //if not matched

            $userPhoto = public_path('images/').$currentPhoto;
        
            if(file_exists($userPhoto)){
                @unlink($userPhoto); // then delete previous photo
            }

        }

        $path = public_path('images');
        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('image');
        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $item->image = $fileName;
        $item->save();
        $file->move($path, $fileName);


        return response()->json(['message'=>'Updated successfully']);
        
        
        
        
        $item->save();

        return response()->json(['message'=>'Updated successfully']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Banana::find($id);
        if($item == ''){
            return response()->json(['message'=>'Not found']);
        }else{
            Banana::destroy($id);
            return response()->json(['message'=>'Deleted successfully']);
        }
    }
}
