@extends('layouts.travel')
@section('content')

@if (Auth::user()->is_admin() == true )
@if(!Auth::guest())
    
              @if(Auth::user()->id == $vol->user_id)

<h2 style="margin-top: 12px;" class="text-center">mettre à jour un vol</a></h2>
<br>
 
<form action="{{route('vols.update',['vol'=>$vol->id])}}" method="POST" name="add_vol">
@csrf
 @method('PUT')
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Ville de Départ :</strong>
            <input type="text" name="ville_dep" class="form-control" value={{old('ville_dep',$vol['ville_dep'])}}>
            <span class="text-danger">{{ $errors->first('Nom') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Ville D'arrivé </strong>
            <input type="text" name="ville_arr" class="form-control" value={{old('ville_arr',$vol['ville_arr'])}}>
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Date De Départ:</strong>
            <input type="date" name="date_dep" class="form-control" value={{old('date_dep',$vol['date_dep'])}}>
            <span class="text-danger">{{ $errors->first('date_dep') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Date D'arrivé':</strong>
            <input type="date" name="date_arr" class="form-control" value={{old('date_arr',$vol['date_arr'])}}>
            <span class="text-danger">{{ $errors->first('date_arr') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Heure de départ:</strong>
            <input type="time" name="heure_dep" class="form-control" value={{old('heure_dep',$vol['heure_dep'])}}>
            <span class="text-danger">{{ $errors->first('heure_dep') }}</span>
        </div>
    </div>
    <div class="col-md-12">
            <div class="form-group">
            <strong>Heure d'arrivé:</strong>
            <input type="time" name="heure_arr" class="form-control" value={{old('heure_arr',$vol['heure_arr'])}}>
            <span class="text-danger">{{ $errors->first('heure_arr') }}</span>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <strong>Classe</strong>
            <input type="text" name="classe" class="form-control" value={{'classe',old($vol['classe'])}}>
            <span class="text-danger">{{ $errors->first('classe') }}</span>
        </div>
    </div>    
    <div class="col-md-12">
    </select>
    <label class="mr-sm-2" for="inlineFormCustomSelect">Entreprise :</label>
    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="entreprise">
      @foreach ($entreprises as $entreprise)
    <option  value="{{$entreprise->id}}">{{ $entreprise->Nom }}</option>
      @endforeach
    </select>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Nombre de places</strong>
        <input type="text" name="num_places" class="form-control" placeholder="Entrer le nombre de places du vol " value="{{ old('num_places',$vol->num_places) }}">
            <span class="text-danger">{{ $errors->first('num_places') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Prix</strong>
        <input type="text" name="prix" class="form-control" placeholder="Entrer le prix du vol " value="{{ old('prix',$vol->prix) }}">
            <span class="text-danger">{{ $errors->first('prix') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Image :</strong>
            <input type="file" name="image" class="img"  >
            <span class="text-danger">{{ $errors->first('image') }}</span>
        </div>
    </div>
    
    <div class="col-md-12">
       <input type="submit" value="mettre à jour" class="btn btn-primary">
    </div>
</div>
 
</form>
@endif
@endif 
@endif

@endsection