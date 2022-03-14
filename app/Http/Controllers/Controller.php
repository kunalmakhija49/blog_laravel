<?php

namespace App\Http\Controllers;

use App\Models\Post;
//use http\Env\Request;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        $category = $request->input('blogs');
        $different_categories = DB::select('select DISTINCT category from posts');
//            "SELECT DISTINCT department from details";
        $result = DB::select('select * from posts where category = :category',['category'=>$category]);
        if(!empty($result)){
//            $posts = DB::select('select * from posts where category = :category',['category'=>$category]);
            $posts = Post::with('user')->where('category',$category)->latest()->paginate(2);
        }else{
            $posts = Post::latest()->paginate(4);
//            $posts = Post::all();


        }

        return view('welcome',compact('posts','different_categories'));
    }
//    public function index()
//    {
//
//
//        $posts = Post::all();
//        return view('welcome',compact('posts'));
//    }

    public function filter(Request $request)
    {
        $category = $request->input('blogs');
        $result = DB::select('select * from posts where category = :category',['category'=>$category]);
        return $result;

  }
}
