@extends('layouts.travel')


 
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Ajouter Une Entreprise</a></h2>
<br>
 
<form action="{{ route('entreprise.store')}}" method="POST" name="add_vol">
@csrf
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Nom</strong>
            <input type="text" name="Nom" class="form-control" placeholder="Nom d'entreprise">
            <span class="text-danger">{{ $errors->first('Nom') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Description :</strong>
            <input type="text" name="Description" class="form-control" placeholder="Description de l'entreprise">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    
    
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection