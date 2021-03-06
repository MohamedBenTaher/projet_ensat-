@extends('layouts.travel')
@section('content')
<div class="album py-5 bg-light">
    <div class="container">
    <div class="row">
      @foreach ($vols as $vol)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            @if ($vol->image)
                <div class="card-img-body">
                  <img class="card-img-top"   width="100%" height="225" src="{{Storage::url($vol->image->path)}}  " alt="Card image cap" ></div>
               @endif
            <div class="card-body">
              <strong class="d-inline-block mb-2 text-primary">TarvelUS</strong>
              <h3 class="card-title">{{$vol['ville_dep'].' vers '.$vol['ville_arr'] }}</h3>
              <div class="mb-1 text-muted">le {{$vol['date_dep']}} en {{$vol->heure_dep}}</div>
              <p class="card-text">travel to {{$vol['ville_arr']}}  </p>
           
               <a href="{{route('vols.show',['vol' => $vol->id])}}"  class="btn btn-outline-Secondary">Volez</a>
        
              @if(!Auth::guest())
          
                @if(Auth::user()->id == $vol->user_id)
        
                  <a href="{{route('vols.edit',['vol'=>$vol->id])}}"  class="btn btn-outline-warning">Mettre à jour</a>
        
                  <form  action="{{ route('vols.destroy',['vol' => $vol->id]) }}" method="POST">
            
                   @csrf
                  @method('DELETE')
          
              
                  <button type="submit" class="btn btn-outline-danger" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </form>
               @endif
          
              @endif
        
              
              </div>
            </div>
          </div>
      
             
         
      @endforeach
        </div>
  @endsection