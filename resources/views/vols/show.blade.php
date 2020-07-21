@extends('layouts.travel')
@section('content')
<div id="card_aff">
<div class="card">
 <div class="card-img-body">
   <img class="card-img" src="{{Storage::url($vol->image->path)}}  " alt="Card image cap"></div>
 <div class="card-body">
   <strong class="d-inline-block mb-2 text-primary">TarvelUS</strong>
   <h3 class="card-title">{{$vol['ville_dep'].' vers '.$vol['ville_arr'] }}</h3>
   <div class="mb-1 text-muted">le {{$vol['date_dep']}}</div>
   <div class="mb-1 text-muted">Départ en : {{$vol['heure_dep']}} arrivé en : {{$vol['heure_arr']}}</div>
   <p class="card-text">voyagez à {{$vol['ville_arr']}} en classe {{$vol->classe}}  </p>


  
    <!--  can('update', $vol)-->
    @if(!Auth::guest())
        
              @if(Auth::user()->id == $vol->user_id)
   <a href="{{route('vols.edit',['vol' => $vol->id])}}"  class="btn btn-outline-warning">Mettre à jour</a>
    <!-- endcan
    can('delete')-->
    <form  action="{{ route('vols.destroy',['vol' => $vol->id]) }}" method="POST">
   @csrf
   @method('DELETE')
   
   @endif
        
   @endif
   <button type="submit" class="btn btn-outline-danger" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
   </form>

<!--endcan--> 
<div class="padding">
  <div class="row">
      <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                  <small>entrer les détails de paiement: </small>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-sm-12">
                          <div class="form-group">
                              <label for="nombre ">Nombre de billets : </label>
                              <input class="form-control" id="nombre" type="number" placeholder="Nombre de billets">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-12">
                          <div class="form-group">
                              <label for="ccnumber">Numéro de carte Banquaire :</label>
                              <div class="input-group">
                                  <input class="form-control" type="text" placeholder="0000 0000 0000 0000" autocomplete="email">
                                  <div class="input-group-append">
                                      <span class="input-group-text">
                                          <i class="mdi mdi-credit-card"></i>
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="form-group col-sm-4">
                          <label for="ccmonth">Mois</label>
                          <select class="form-control" id="ccmonth">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                              <option>7</option>
                              <option>8</option>
                              <option>9</option>
                              <option>10</option>
                              <option>11</option>
                              <option>12</option>
                          </select>
                      </div>
                      <div class="form-group col-sm-4">
                          <label for="ccyear">Année</label>
                          <select class="form-control" id="ccyear">
                              <option>2014</option>
                              <option>2015</option>
                              <option>2016</option>
                              <option>2017</option>
                              <option>2018</option>
                              <option>2019</option>
                              <option>2020</option>
                              <option>2021</option>
                              <option>2022</option>
                              <option>2023</option>
                              <option>2024</option>
                              <option>2025</option>
                          </select>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="cvv">CVV/CVC</label>
                              <input class="form-control" id="cvv" type="text" placeholder="123">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card-footer">
              
                      <a class="btn btn-success" type="submit">Continue</a> 
              </div>
          </div>
      </div>
  </div>
</div>
 </div>
</div>
</div>   
@endsection