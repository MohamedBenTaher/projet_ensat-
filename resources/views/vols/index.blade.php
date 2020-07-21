@extends('layouts.travel')
@section('content')
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active img-fluid ">
     <img  class="d-block w-100"src="{{asset('img/japan.jpg')}}" alt="forest" style="width:80% ;height:570px
     ">
      <div class="carousel-caption">
        <h3><strong>Tokyo </strong></h3>
        <p>explore the rich cultuture of Japan in the wonderful Tokyo  </strong></p>
      </div>
    </div>
    <div class="carousel-item img-fluid ">
      <img class="d-block w-100" src="{{asset('img/italie.jpg')}}"  alt="desert"style="width:80% ;height:570px
      ">
      <div class="carousel-caption">
        <h3><strong>Folerence </strong></h3>
        <p> <strong>enjoy the beauty and history of Folerence </strong> </p>
      </div>
    </div>
    <div class="carousel-item img-fluid ">
      <img class="d-block w-100" src="{{asset('img/turkey.jpg')}}" alt="tropical" style="width:80% ;height:570px
      ">
      <div class="carousel-caption">
        <h2><strong> Istanbul</strong></h2>
        <p><strong> live the rich turkish cultural heritage in a unique experience in Istanbul </strong> </p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>

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
