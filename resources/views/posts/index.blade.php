@extends ('layouts.master')


<h2> Johan's Blog 2.0</h2>
@include ('layouts/app')

@section ('content')

<div id='menu'>

@guest
  @else
  @if( Auth::user()->email == 'johanjorritsma@hotmail.com')
  <button class="menubutton" onclick="window.location.href = 'posts/create';">Create blog</button><hr>
  @endif
@endguest
  <div class="dropdown">
    <button class="dropbtn">Category</button>
      <div class="dropdown-content">
        @foreach ($categories as $category)
        <button class="menubutton" onclick="getMessage('{{ $category->category }}');">{{ $category->category }}</button>
        @endforeach
        <hr>
        <div id='searchoptions'>
        <form action="/search" method="GET">
          {{csrf_field()}}
          <input placeholder="enter keyword" name="search" type="text" id="search">
          <button  class="fa fa-search" type="submit"></button>
        </form>
        </div>
      </div>
  </div>
<hr>
</div>

<div id="main2">
  @foreach ($posts as $post)
    @include ('posts.posts')
  @endforeach

@endsection
</div>


<script>
//function to select categories without reloading the page
function getMessage(category){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "/posts/sort/" + category, false);
    xhttp.send();

    document.getElementById("main2").innerHTML = xhttp.responseText;
  }

</script>
