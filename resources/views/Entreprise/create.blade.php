@extends('layouts.travel')


 
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add Product</a></h2>
<br>
 
<form action="{{ route('entreprises.store')}}" method="POST" name="add_vol">
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
            <input type="text" name="Description" class="form-control" placeholder="arrivé">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Date De Départ:</strong>
            <input type="datetime" name="date_dep" class="form-control" placeholder="Entrer une date de départ">
            <span class="text-danger">{{ $errors->first('date_dep') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Date D'arrivé':</strong>
            <input type="datetime" name="date_arr" class="form-control" placeholder="Entrer une date d'arrivé">
            <span class="text-danger">{{ $errors->first('date_arr') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Classe</strong>
            <input type="text" name="classe" class="form-control" placeholder="Entrer la classe du vol ">
            <span class="text-danger">{{ $errors->first('classe') }}</span>
        </div>
    </div>
    @foreach ($entreprises as $entreprise)
    <div class="col-md-12">
        <div class="form-group">
            <strong>Entreprise : </strong>
            <input type="radio" name="entreprise" class="form-control"value={{$entreprise['Nom']}}>
            <span class="text-danger">{{ $errors->first('classe') }}</span>
        </div>
    </div>
    @endforeach
    <div class="col-md-12">
        <div class="form-group">
            <strong>Image :</strong>
            <input type="file" name="Entreprise" class="form-control"  >
            <span class="text-danger">{{ $errors->first('image') }}</span>
        </div>
    </div>
    
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection