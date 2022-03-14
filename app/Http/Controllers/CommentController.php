<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reply;


class CommentController extends Controller
{
    public function storecomment(Request $request)
    {
        $request->validate([
            'comment'=>'required'
        ]);
        $comment = $request->input('comment');
        $user_id = Auth::User()->id;
        $post_id = $request->input('post_id');
        $storecomment = new comment();
        $storecomment->comment=$comment;
        $storecomment->user_id=$user_id;
        $storecomment->post_id=$post_id;
        $storecomment->save();
        return redirect('/blog_desc/'.$post_id);

    }
    public function storereply(Request $request)
    {
        $request->validate([
           'reply'=>'required'
        ]);
        $reply = $request->input('reply');
        $user_id = Auth::User()->id;
        $comment_id=$request->input('comment_id');
        $storereply = new Reply();
        $storereply->description=$reply;
        $storereply->user_id=$user_id;
        $storereply->comment_id=$comment_id;
        $storereply->save();
        return redirect()->back();

    }
    public function destroy($id)
    {

        $comment = comment::find($id);
        if(auth()->user()->is($comment->user)){
            $comment->delete();
        }

        return back();
    }


}
