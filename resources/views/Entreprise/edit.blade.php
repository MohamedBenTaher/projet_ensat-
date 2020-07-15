@extends('layouts.travel')
@section('content')
@if (Auth::user()->is_admin() == true )
@if(!Auth::guest())
    
              @if(Auth::user()->id == $ent->user_id)

<h2 style="margin-top: 12px;" class="text-center">Mettre à jour les infos de l'entreprise</a></h2>
<br>
 
<form action="{{ route('entreprise.update','entreprise'=>$ent->id)}}" method="POST" name="add_vol">
@csrf
@method('PUT')
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Nom</strong>
            <input type="text" name="Nom" class="form-control" value="{{old('Nom',$ent->Nom)}}" >
            <span class="text-danger">{{ $errors->first('Nom') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Description :</strong>
            <input type="text" name="Description" class="form-control" value="{{old('Description',$ent->Description)}}">
            <span class="text-danger">{{ $errors->first('Description') }}</span>
        </div>
    
    
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endif
@endif 
@endif
@endsection