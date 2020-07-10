<?php
use App\User;
use App\Comment;?>
@extends('layouts.app')
@section('head')
<link href="{{ asset('css/comment.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
  {!!Form::open(['action' =>'commentsController@store', 'method' => 'post'])!!}
        
    {{Form::textarea('content')}} <br>
    {{Form::hidden('user_id',Auth::user()->id)}} <br>
        {{Form::submit('publish',['class' =>'btn btn-primary'])}} 

{!! Form::close() !!}
<div style="height:50px"></div>
</div>
@foreach (Comment::all() as $comment)
<div class="container" id="comment">
<h3>{{User::Find($comment->user_id)->name}} <span style="font-size: 15px">{{$comment->created_at}}</span></h3>
  @if(url()->current()=='http://127.0.0.1:8000/commentupdate')
  @if($comment->id==$id)
  {!! Form::open(['action'=>'commentsController@show','method'=>'post'])!!}
{{Form::text('content',$comment->content)}} <br>
{{Form::submit('submit',['class'=>'btn btn-primary'])}}
{{Form::hidden('id',$comment->id)}}
{!! Form::close()!!}
{!! Form::open(['action'=>'commentsController@update','method'=>'post'])!!}
{{Form::submit('update',['class'=>'btn btn-primary'])}}
{{Form::hidden('id',$comment->id)}}
{!! Form::close()!!}
  @else
  <h5>{{$comment->content}}</h5>

  @endif
  @else
  <h5>{{$comment->content}}</h5>
 

<div class="button">
  @if(Auth::user()->id==$comment->user_id)
  {!! Form::open(['action'=>'commentsController@update','method'=>'post'])!!}
  {{Form::submit('update',['class'=>'btn btn-primary'])}}
  {{Form::hidden('id',$comment->id)}}
  {!! Form::close()!!}
  {!! Form::open(['action'=>'commentsController@destroy','method'=>'post'])!!}

{{Form::submit('delete',['class'=>'btn btn-primary'])}} 
  {{Form::hidden('content',$comment->id)}}
{!! Form::close()!!}
<br>


  @endif
  @endif
</div>
</div>
    
@endforeach
@endsection