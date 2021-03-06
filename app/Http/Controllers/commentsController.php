<?php

namespace App\Http\Controllers;

use App\User;
use App\Comment;
use App\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commentsController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        
        return redirect('/entreprise')->with('success','comment added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id=$request->input('id');
        $comment=Comment::Find($id);
        $comment->content=$request->input('content');
        $comment->save();
        return redirect('/entreprise');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$request->input('id');
        $ents=Entreprise::all();
        return view('/Entreprise/index',['id'=>$id,'ents'=>$ents]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->input('content');
        Comment::where('id',$id)->delete();
        return redirect("/entreprise");
    }
}
