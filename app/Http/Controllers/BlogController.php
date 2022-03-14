<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('singlepost');
    }

    //
    public function show()
    {
        return view('blog');
    }

    public function create()
    {
        return view('create-blog');
    }
    public function store(Request $request)
    {
        $request->validate([
            'heading'=>'required',
            'description'=>'required',
            'category'=>'required'
        ]);
        $day = date('l');
        $date = date('d M Y');
        $title = $request->input('heading');
        $body = $request->input('description');
        $category=$request->input('category');
        $user_id = Auth::User()->id;
        $post = new Post();
        $post->title=$title;
        $post->body=$body;
        $post->user_id=$user_id;
        $post->weekday=$day;
        $post->date=$date;
        $post->category=$category;
        $post->save();

        return redirect('/');

    }
    public function singlepost($id,Request $request)
    {
        $posts = Post::with('comments','user:id,name')->find($id);

//        $post_id = $request->input(2);
        //$post_comments = comment::find($id);
       // $commentsdata = compact('post_comments');
       // $data = compact('posts');
       return view('description',compact('posts'));
    }
    public function listview()
    {
        $posts = Post::all();
        $data = compact('posts');
//        dd($data);
        return view('dashboard')->with($data);

    }
    public function update($id)
    {
        $post = Post::find($id);
        if(is_null($post)|| auth()->user()->id !== $post->user->id){
            return redirect('/dashboard');
        }else{
            $data = compact('post');
            return view('update')->with($data);
        }
    }

    public function edit($id,Request $request)
    {
        $post = Post::find($id);
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->category = $request['category'];
        $post->save();
        return redirect('/dashboard');
    }
    public function delete($id)
    {
        $post = Post::find($id);
        if (!is_null($post)){
            $post->delete();

        }
        return redirect('dashboard');


    }
}
