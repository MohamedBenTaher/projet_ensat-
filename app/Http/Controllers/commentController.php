<?php

namespace App\Http\Controllers;

use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
{
    $this->middleware('auth');
}
    public function index()
    {
        return view("comments.comment");

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'content'   => 'required',
            'user_id'   => 'required'
        ]);
        $comment=new Comment;
            $comment->content= $request->input('content');
            $comment->user_id =$request->input('user_id');
        $comment->save();
        
        return redirect('comments/comment')->with('success','comment added');
    }
    public function delete(Request $request)
    {
        $id=$request->input('content');
        Comment::where('id',$id)->delete();
        return redirect("comments/comment");
    }
   
    public function update(Request $request)
    {
        $id=$request->input('id');
        return view('comments/comment',['id'=>$id]);
    }
    public function submit(Request $request){
        $id=$request->input('id');
        $comment=Comment::Find($id);
        $comment->content=$request->input('content');
        $comment->save();
        return redirect('comments/comment');

    }
}
