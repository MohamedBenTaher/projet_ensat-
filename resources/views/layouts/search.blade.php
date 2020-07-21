<form class="f" action="{{route('vols.search')}}">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="q" value="{{request()->q ?? ''}}">
    <button style="color:#ffff; background-color:rgb(28,37,65) ;border-radius:25rem"class="btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  </form>