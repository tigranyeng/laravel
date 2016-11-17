<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Http\Requests\PostRequest;





use Illuminate\Contracts\Auth\Guard;

use File; 
class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('posts',['posts'=>$posts]);
       
    }
    public function add()
    {
        return view('add_post');
    }
    
    public function show($id){
        $post=Post::find($id);
        if($post){
            return view('show',['post'=>$post]);
        }
        return 'page not found!';
    }

 

    public function create(PostRequest $request)
    {
        // dump($request->all());
        $this->validate($request,[
            'title'=>'required|max:255',
            'content'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg'
        ]);

        $data=$request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imagename = time() . str_random(5).'.'.$image->getClientOriginalExtension();
            $image->move(public_path() . '/images/', $imagename);
            //var_dump($image);die;
            $data['image']=$imagename;
        }
        $data['user_id'] = Auth::user()->id;
        $post= new Post;
        $post->fill($data);
        //dump($post);die;
        $post->save();

        return redirect('posts');
    }

    public function my_posts($id)
    {
       
        if (Auth::user()->id == $id){
            $posts=Post::where('user_id', $id)->get();
            // dump($post);
            return view('my_posts',['posts'=>$posts]);
        }
        return "dzzzz";
    }

    public function edit_form($id)
    {
        $post=Post::find($id);
        if(Auth::user()->id == $post->user_id)
        {
            return view('edit_form',['post'=>$post]);
        }
        return "Aber mi bzbza...!!!";
    }

    public function edit_post(Request $request,Post $post, $id){
        $this->validate($request,[
            'title'=>'required|max:255',
            'content'=>'required',
            'image'=>'image|mimes:jpg,png,jpeg'
        ]);
        $post = $post->find($id);
        if(Auth::user()->id == $post->user_id){
            $user_id=Auth::user()->id;
            $imagename=$post->image;
            if($request->hasFile('image')){
                File::delete('images/'.$imagename);
                $image = $request->file('image');
                $imagename = time() . str_random(5).'.'.$image->getClientOriginalExtension();
                $image->move(public_path() . '/images/', $imagename);
            }
            $post->update(['title'=>$request->title,'image'=>$imagename,'content'=>$request->content]);
            return redirect('/my_posts/'.$user_id);
        }
        return 'vay vay vay';
    }

    public function delete(Post $post, $id)
    {   
        $post = $post->find($id);
       
        if(Auth::user()->id == $post->user_id){
            $post->delete();
            $user_id=Auth::user()->id;
            $file=$post->image;
           
            File::delete('images/'.$file);
           
            return redirect('/my_posts/'.$user_id);
        }
        return "aber shat es bzbzum!!!";
    }
    
}
