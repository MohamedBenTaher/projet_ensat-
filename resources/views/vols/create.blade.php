@extends('layouts.travel')
 
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Ajouter Un Vol</a></h2>
<br>
 
<form action="{{ route('vols.store')}}" method="POST" name="add_vol">
@csrf
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Ville de Départ :</strong>
            <input type="text" name="ville_dep" class="form-control" placeholder="Nom d'entreprise">
            <span class="text-danger">{{ $errors->first('Nom') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Ville D'arrivé </strong>
            <input type="text" name="ville_arr" class="form-control" placeholder="arrivé">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Date De Départ:</strong>
            <input type="date" name="date_dep" class="form-control" placeholder="Entrer une date de départ">
            <span class="text-danger">{{ $errors->first('date_dep') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Date D'arrivé':</strong>
            <input type="date" name="date_arr" class="form-control" placeholder="Entrer une date d'arrivé">
            <span class="text-danger">{{ $errors->first('date_arr') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Heure de départ:</strong>
            <input type="time" name="heure_dep" class="form-control" placeholder="Entrer une heure de départ">
            <span class="text-danger">{{ $errors->first('heure_dep') }}</span>
        </div>
    </div>
    <div class="col-md-12">
            <div class="form-group">
            <strong>Heure d'arrivé:</strong>
            <input type="time" name="heure_arr" class="form-control" placeholder="Entrer une heure d'arrivé">
            <span class="text-danger">{{ $errors->first('heure_arr') }}</span>
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
        <input class="col-span-2"type="radio" name={{$entreprise['id']}} class="form-control"value={{$entreprise['Nom']}}>
            <label class="col-span-2" for={{$entreprise['id']}}>{{$entreprise['Nom']}}</label>
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
