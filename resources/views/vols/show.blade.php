@extends('layouts.travel')
@section('content')
<div id="card_aff">
<div class="card">
 <div class="card-img-body">
   <img class="card-img" src="{{Storage::url($vol->image->path)}}  " alt="Card image cap"></div>
 <div class="card-body">
   <strong class="d-inline-block mb-2 text-primary">TarvelUS</strong>
   <h3 class="card-title">{{$vol['ville_dep'].'vers '.$vol['ville_arr'] }}</h3>
   <div class="mb-1 text-muted">le {{$vol['date_dep']}}</div>
   <div class="mb-1 text-muted">Départ en : {{$vol['heure_dep']}} arrivé en : {{$vol['heure_arr']}}</div>
   <p class="card-text">voyagez à {{$vol['ville_arr']}} en classe {{$vol->classe}}  </p>

 <a href="{{route('stripe', 'id'=>$vol->id)}}"  class="btn btn-outline-Secondary">{{$vol->prix}}</a>
  
    @can('update', $vol)
   <a href="{{route('vols.edit',['vol'=>$vol->id])}}"  class="btn btn-outline-warning">Mettre à jour</a>
    @endcan
    @can('delete')
    <form  action="{{ route('vols.destroy ',['vol' => $vol->id]) }}" method="POST">
   @csrf
   @method('DELETE')
   <button type="submit" class="btn btn-outline-danger" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
   </form>

@endcan

 </div>
</div>
</div>   
@endsection