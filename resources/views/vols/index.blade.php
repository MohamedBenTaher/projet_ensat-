@extends('layouts.travel')
@section('content')
    

  <div class="row mb-2">
      @foreach ($vols as $vol)
          
      
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">TarvelUS</strong>
          <h3 class="mb-0">{{$vol['ville_dep'].'vers '.$vol['ville_arr'] }}</h3>
        <div class="mb-1 text-muted">le {{$vol['date_dep']}} en {{$vol->heure_dep}}</div>
        <p class="card-text mb-auto">travel to {{$vol['ville_arr']}}  </p>
        <p><strong>prix</strong>: {{$vol->prix}}</p>
        <a href={{route('vols.delete'['id'=>$vol->id])}}></a>
        <a href={{route('vols.edit',['id'=>$vol->id])}} class="btn btn-warning">Mettre à jour</a>
          <a href={{route('vols.show',['id'=>$vol->id] )}} class="btn btn-primary">Volez</a>
            </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
