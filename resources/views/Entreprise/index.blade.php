@extends('layouts.travel')
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

         @can('view',$ent)
         <a href={{route('entreprise.show',['ent'=>$ent->id] )}} class="btn btn-outline-Secondary">infos and Reviews</a>
         @endcan
         @can('update', $ent)
        <a href={{route('entreptise.edit',['ent'=>$ent->id])}} class="btn btn-outline-warning">Mettre à jour</a>
         @endcan
         @can('delete')
         <form  action="{{ route('entreprise.destroy ',['ent' => $ent->id]) }}" method="POST">
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

    @endforeach
  </div>
</div>
@endsection