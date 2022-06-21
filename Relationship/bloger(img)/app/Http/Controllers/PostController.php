<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

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
        return Post::with(['user', 'comment'])->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'user_id' => 'required',
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        
        $path = public_path('images');
        if(!file_exists($path)){
            mkdir($path, 0777, true);
        }
        $file = $request->file('image');
        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $post->image = $fileName;
        
        $post->save();
        $file->move($path, $fileName);


        // #2 Method upload image 
        // $post->image = $request->file('image')->store('public');


        // $uploadFolder = 'posts';
        // $image = $request->file('image');
        // $image_uploaded_path = $image->store($uploadFolder, 'public');
        // $uploadedImageResponse = array(
        //     "image_name" => basename($image_uploaded_path),
        //     "image_url" => Storage::disk('public')-> put($image_uploaded_path),
        //     "mime" => $image->getClientMimeType()
        // );

        return response(['message'=>'created succeed!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if(!empty($post)){
            return $post;
        }
        return response()->json(['sms'=>'post not found!!!!!']);
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'user_id' => 'required',
        ]);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;

        $currentPhoto = Post::find($id)->image;  //fecthing user current photo
        if($request->image != $currentPhoto){  //if not matched

            $userPhoto = public_path('images/').$currentPhoto;
        
            if(file_exists($userPhoto)){
                @unlink($userPhoto); // then delete previous photo
            }

        }

        $path = public_path('images');
        if(!file_exists($path)){
            mkdir($path, 0777, true);
        }
        $file = $request->file('image');
        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $post->image = $fileName;
        $post->save();
        $file->move($path, $fileName);
        return response(['message'=>'update succeed!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(!empty($post)){
            $image = $post->image;
            $postPhoto = public_path('images/').$image;
            if(file_exists($postPhoto)){
                @unlink($postPhoto); // then delete previous photo
            }
            $post->delete();
            // return response()->json(['sms'=>'deleted successfully']);
            return response()->json($postPhoto);
        }
        return response()->json(['sms'=>'User can not found!!']);
    }

    public function search($title){
        return Post::where('title', 'like', '%'.$title. '%')->get();
    }
}
