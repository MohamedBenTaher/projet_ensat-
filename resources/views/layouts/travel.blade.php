<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>TravelUs</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/album/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">
@yield('head')
    

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
  </head>
  <body>
    <header>
      <div class=" text-center">
        <a class="blog-header-logo text-dark" href="#"><img class="logo" src="{{ asset('img/logo.png') }}" alt="TravelUS" ></a>
      </div>
      <div>
      @include('layouts.search')
      </div>
    </header>

  <div class="navbar navbar-light">
      <a href="{{route('home')}}" class="navbar-link">Home</a>
      <a href="{{route('vols.index')}}" class="navbar-link">Nouvelles Destinations</a>
      <a href="{{route('vols.index')}}" class="navbar-link">Offres et Soldes</a>
      @if(Auth::check())
      @if (Auth::user()->is_admin() == true )
      <a href="{{route('vols.create')}}" class="navbar-link">Ajouter Un Vol </a><!--Admin-->
      <a href="{{route('entreprise.create')}}" class="  navbar-link">Ajouter Un Collaborateur </a><!--Admin-->
      
      @endif
      @endif
      <a href="{{route('entreprise.index')}}" class="navbar-link">Collaborateurs</a>


    </div>
  </div>


<main role="main">

  
  @yield('content')
  @if (request()->input('q')) 
     <h6 class="alert alert-info">{{$vols->total()}} résultat(s) pour la recherche "{{request()->q}}"</h6>
  @endif
</main>

<footer class="text-muted" id="foot">
 
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
  </div>
  <div>
   <center><p style="color:white">Project Done By : Youssef Charfi , Yussuf Laidouni , Mohamed Ben Taher, El Mehdi Mansour</p></center>
  </div>
</footer>
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		
</body>
</html>
