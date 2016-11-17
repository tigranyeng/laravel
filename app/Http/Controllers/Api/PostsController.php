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
        //$posts = Post::all();
        //dd(json(compact('posts'),200));
        return response()->json(compact('posts'),200);
        //return compact('posts');
    }
    public function show(Post $post,$id){
        $post=Post::find($id);
        
           
        return response()->json(compact('post'),200);
    
    }
   } 