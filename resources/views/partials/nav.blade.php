{{-- <nav>
    <ul>
        <li><a href="{{ route('home') }}">@lang('Home')</a></li>
        <li><a href="{{ route('contact') }}">@lang('Contact')</a></li>
    </ul>
</nav> --}}
<nav class="navbar navbar-expand-lg navbar-light bg-custom poke-border fixed-top">
  <a class="navbar-brand" href="{{ route('home') }}">PokeAPI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ml-auto">
      {{-- <form class="form-check-inline my-2 my-lg-0"> --}}
        <input class="form-control mr-sm-2 poke-search" type="text" placeholder="Search" aria-label="Search">
        {{-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
      {{-- </form> --}}
    </ul>
    
  </div>
</nav>