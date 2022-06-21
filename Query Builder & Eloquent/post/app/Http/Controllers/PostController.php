<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Method 1
        // return Post::get();

        // //Method 2
        // return Post::all();

        //Method 2
        return Post::get()->all();
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // // Method 1
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required'
        // ]);
        // $post = new Post;
        // $post->title = $request->title;
        // $post->description = $request->description;

        // $post->save();

        // // Method 2
        // $storeData = $request->validate([
        //     'title' => 'required|max:255',
        //     'description'=> 'required|max:255',
        // ]);
        // Post::create($storeData);

        // Method 3
        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return response()->json(['message'=>'upload successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // // Method 1
        // return Post::find($id);

        // Method 2
        // return Post::where('id','=', $id)->get();

        // Method 3
        return Post::where('id',$id)->first();
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
        // //Method 1
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required'
        // ]);
        // $post = Post::findOrFail($id);
        // $post->title = $request->title;
        // $post->description = $request->description;

        // $post->save();

        // Method 2
        // $updateData = $request->validate([
        //     'title' => 'required|max:255',
        //     'description'=> 'required|max:255',
        // ]);
        // Post::whereId($id)->update($updateData);

        // Method 3
        $updateData = $request->validate([
            'title' => 'required|max:255',
            'description'=> 'required|max:255',
        ]);
        Post::find($id)->update($updateData);
        return response()->json(['message'=>'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Method 1
        // Post::destroy($id);

        // // Method 2
        // $post = Post::findOrFail($id);
        // $post->delete();

        // Method 3
        Post::where('id', $id)->delete();
        return response()->json(['message'=>'deleted successfully']);
    }
}
