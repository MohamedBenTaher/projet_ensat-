<?php
use App\User;
use App\Likes;
use App\Dislikes;
use App\Comment;?>
@extends('layouts.travel')
@section('head')
<script src="https://kit.fontawesome.com/3ecb8148e3.js" crossorigin="anonymous"></script>

<link href="{{ asset('css/comment.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row mb-2">
    @foreach ($ents as $ent)
    <div id="card_aff">
     <div class="card">
      <div class="card-img-body">
      <div class="card-body">
        <strong class="d-inline-block mb-2 text-primary">TarvelUS</strong>
         <h3 class="card-title" >{{$ent->Nom}}</h3>
         <p class="card-text">{{$ent->Description}}</p>

          <!-- can('view',$ent)-->

        
         <a href="{{route('entreprise.show',['entreprise' => $ent->id])}}" class="btn btn-outline-Secondary">infos and Reviews</a>
         
         <!-- endcan
         can('update', $ent)-->
        @if(!Auth::guest())
        
              @if(Auth::user()->id == $ent->user_id)
 
         

        <a href="{{route('entreprise.edit',['entreprise' => $ent->id])}}" class="btn btn-outline-warning">Mettre à jour</a>
         
        <!-- endcan
         can('delete')-->
         
         <form  action="{{ route('entreprise.destroy ',['entreprise' => $ent->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        
        
        <button type="submit" class="btn btn-outline-danger" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </form>
        @endif
        
        @endif
     <!-- endcan -->
   
      </div>
    </div>
  </div>

    @endforeach
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
    {{Form::text('content',"$comment->content")}} <br>
    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {{Form::hidden('id',$comment->id)}}
    {!! Form::close()!!}
    {!! Form::open(['action'=>'commentsController@update','method'=>'post'])!!}
    {{Form::submit('update',['class'=>'btn btn-primary'])}}
    {{Form::hidden('id',$comment->id)}}
    {!! Form::close()!!}
      @else
      <h5>{{$comment->content}}</h5> <br>
    
      @endif
      @else
      <h5>{{$comment->content}}</h5>
      {!! Form::open(['action'=>'likesController@store','method'=>'post'])!!}
      {{Form::hidden('comment_id',$comment->id)}}
      {{Form::hidden('user_id',Auth::user()->id)}}
     <button type="submit"><i class="far fa-thumbs-up"></i></button>
     {!! Form::close()!!}
      {!! Form::open(['action'=>'dislikesController@store','method'=>'post'])!!}
      {{Form::hidden('comment_id',$comment->id)}}
      {{Form::hidden('user_id',Auth::user()->id)}}
     <button type="submit"><i class="far fa-thumbs-down"></i></button>
     {!! Form::close()!!}
    <h2>{{Likes::where('comment_id',$comment->id)->latest()->first()->number ?? null }}</h2>
    <h2>{{Dislikes::where('comment_id',$comment->id)->latest()->first()->number ?? null }}</h2>
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