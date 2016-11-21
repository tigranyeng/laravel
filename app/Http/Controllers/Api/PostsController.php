<?php

namespace App\Http\Controllers\Api;




use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;




use Illuminate\Contracts\Auth\Guard;

use File; 




 

class PostsController extends Controller{
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $posts = $post->all();
        return response()->json(compact('posts'),200);
    
    }

    public function show($id)
    {
        $post=Post::find($id);
        return response()->json(compact('post'),200);
    
    }

    public function my_posts(Post $post)
    {
         $posts=$post->where('user_id', Auth::user()->id)->get();
         return response()->json(compact('posts'),200);
    }

    public function store(Post $post, Request $request,Guard $auth)
    {
        $data=$request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imagename = time() . str_random(5).'.'.$image->getClientOriginalExtension();
            $image->move(public_path() . '/images/', $imagename);
            //var_dump($image);die;
            $data['image']=$imagename;
        }
        $data['user_id'] = Auth::user()->id;
       
        $post->fill($data);
        $post->save();
        
        
        return response()->json(compact('ok'),201);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'title'=>'required|max:255',
            'content'=>'required',
            'image'=>'image|mimes:jpg,png,jpeg'
        ]);
        $data=$request->all();
        $post = Post::find($id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imagename = time() . str_random(5).'.'.$image->getClientOriginalExtension();
            $image->move(public_path() . '/images/', $imagename);
            //var_dump($image);die;
            $data['image']=$imagename;
        }
        
       
        $post->update(['title'=>$request->title,'image'=>$imagename,'content'=>$request->content]);
            return response()->json( ['message' => 'success'],200);
        
        
       
       
    }

    public function destroy($id)
    {
        $post=Post::destroy($id);
        
            return response()->json( ['message' => 'success'],200);
        
    }
   } 