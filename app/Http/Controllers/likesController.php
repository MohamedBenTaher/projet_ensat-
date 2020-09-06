<?php

namespace App\Http\Controllers;

use App\Likes;
use Illuminate\Http\Request;

class likesController extends Controller
{
    public function store(Request $request){
        $comment_id=$request->input('comment_id');
        $user_id=$request->input('user_id');
        $number=count(likes::where('comment_id',$comment_id)->get());
        $number_user=count(likes::where('user_id',$user_id)->where('comment_id',$comment_id)->get());
        if($number_user==0){
        if($number>0){
            $num=likes::where('comment_id',$comment_id)->get();
            likes::where('comment_id',$comment_id)->update(['number' =>$num[0]->number+1]);
            $like=new Likes;
        $like->user_id=$user_id;
        $like->comment_id=$comment_id;
        $like->number=$num[0]->number+1;
        $like->save();
        }
        else{
        $like=new Likes;
        $like->user_id=$user_id;
        $like->comment_id=$comment_id;
        $like->number=1;
        $like->save();}}
        else{
                        $num=likes::where('comment_id',$comment_id)->get();
            likes::where('comment_id',$comment_id)->update(['number' =>$num[0]->number-1]);
            likes::where('user_id',$user_id)->delete();
        }
        return redirect('/entreprise');
    }

}
