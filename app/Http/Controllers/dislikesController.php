<?php

namespace App\Http\Controllers;

use App\Dislikes;
use Illuminate\Http\Request;

class dislikesController extends Controller
{
    public function store(Request $request){
        $comment_id=$request->input('comment_id');
        $user_id=$request->input('user_id');
        $number=count(Dislikes::where('comment_id',$comment_id)->get());
        $number_user=count(Dislikes::where('user_id',$user_id)->where('comment_id',$comment_id)->get());
        if($number_user==0){
        if($number>0){
            $num=Dislikes::where('comment_id',$comment_id)->get();
            Dislikes::where('comment_id',$comment_id)->update(['number' =>$num[0]->number+1]);
            $like=new DisLikes;
        $like->user_id=$user_id;
        $like->comment_id=$comment_id;
        $like->number=$num[0]->number+1;
        $like->save();
        }
        else{
        $like=new DisLikes;
        $like->user_id=$user_id;
        $like->comment_id=$comment_id;
        $like->number=1;
        $like->save();}}
        else{
                        $num=Dislikes::where('comment_id',$comment_id)->get();
            Dislikes::where('comment_id',$comment_id)->update(['number' =>$num[0]->number-1]);
            Dislikes::where('user_id',$user_id)->delete();
        }
        return redirect('/entreprise');
    }
}
