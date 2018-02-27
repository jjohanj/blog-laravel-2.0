@extends ('layouts.master')

<h2> Johan's Blog 2.0</h2>
@section ('content')
<div id='menu'>


<button class="menubutton" onclick="window.location.href = 'posts/create';">Create blog</button><hr>
  <b>Categorie:</b>
  @foreach ($categories as $category)
    <button class="menubutton" onclick="getMessage('{{ $category->category }}');">{{ $category->category }}</button>
  @endforeach

<hr>
</div>

<div  id="main2">
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
