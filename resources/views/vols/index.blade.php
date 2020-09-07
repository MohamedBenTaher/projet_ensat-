@extends('layouts.travel')
@section('content')
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

<style>
  #form{
    padding-top:20px;
    padding-bottom: 20px;
    background-color:rgba(0,0,0,0.5);
    width: 60%;
    position: absolute;
    z-index: 9999;
    margin-left: 20%;
    margin-top: 50px;
  }
  @media only screen and (max-width:1000px){
    #form{
      width: 70%;
      margin-left: 15%;
      margin-top: 20px;


    }
  }
  #form .btn{
    margin-top: 20px;

  }
  option .span{
    color: red;
  }
  .form-control{
    background-color: rgba(0,0,0,);
    margin-bottom: 10px;
  }
  .text{
    font-size: 17px;
    color: white;
  }
</style>
<script>
  document.getElementsByClassName("link").click(function(){
  })
</script>
<div class="container" id="form">
  <center><h2 style="color: white">Where to go <span style="color: yellow">NEXT?</span></h2></center> <br>
  <form action="">
    <div class="row justify-content-center">
      <div class="col-6"> <a href="" class="link"><span class="text">Aller-retour</span></a></div>
      <div class="col-6"> <a href="" class="link"><span class="text">Aller simple</span></a></div>
    </div> <br>
  <div class="row justify-content-center">
    
    <div class="col-6"><input type="text" class="form-control" placeholder="From"  ></div>
    
    <div class="col-6"><input type="text" class="form-control" placeholder="To"  ></div>
    <div class="col-6"><input type="date" class="form-control" placeholder="Depart In"  ></div>
    <div class="col-6"><input type="date" class="form-control" placeholder="Arrive In "></div>
    <div class="col-6"><select  class="form-control">
      <option value="1 Adult" >Adult</option>
      <option value="2 Adult">Child</option>
    </select></div>
    <div class="col-6"><select type="text" class="form-control" placeholder="class">
      <option value="">First Class</option>
      <option value="">Second Class</option>
      <option value="">Economic Class</option>
      </select>
    </div>
    <center><div class="col-12"><button class="btn btn-primary">Check now</button></div></center>
  </form>
</div>
</div>
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active img-fluid">
     <img  class="d-block w-100"src="{{asset('img/japan.jpg')}}" alt="forest" style="width:80% ;height:570px
     ">
      <div class="carousel-caption">
        
        <h3><strong>Tokyo </strong></h3>
        <p>Explore the rich cultuture of Japan in the wonderful Tokyo  </strong></p>
      </div>
    </div>
    <div class="carousel-item img-fluid ">
      <img class="d-block w-100" src="{{asset('img/italie.jpg')}}"  alt="desert"style="width:80% ;height:570px
      ">
      <div class="carousel-caption">
        
        <h3><strong>Folerence </strong></h3>
        <p> <strong>Enjoy the beauty and history of Folerence </strong> </p>
      </div>
    </div>
    <div class="carousel-item img-fluid ">
      <img class="d-block w-100" src="{{asset('img/turkey.jpg')}}" alt="tropical" style="width:80% ;height:570px
      ">
      <div class="carousel-caption">
        <h2><strong> Istanbul</strong></h2>
        <p><strong>Live the rich turkish cultural heritage in a unique experience in Istanbul </strong> </p>
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
