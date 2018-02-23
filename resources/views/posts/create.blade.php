@extends ('layouts.master')

@section ('content')


<h2>Screen for the submitting a blog post</h2>
<div id='createscreen'>
<button onclick="window.location.href = '/';">Home</button><br><hr>

  <h3>Create a Post!</h3>


  <div id="form">
    <form action="/posts" method="POST">
      {{csrf_field()}}
      <input placeholder="Title" name="title" type="text" id="title"></br>
      <input type="radio" name="category" value="report" checked> Report<br>
      <input type="radio" name="category" value="result"> Result<br>
      <textarea rows="5" placeholder="Blog text" name="body" type="text" id="body"></textarea></br>
      <button type="submit">Submit Blog!</button></br>
    </form>
  </div>

@include('layouts.errors')

<div id="sheet">
  <p>Text Expander</p>
  scp = SC de Paardensprong<br>
  ela = Eli Alia<br>
  trn = toernooi<br>
  scm = schaakmat <br>
  tgs = tegenstander
</div>
</div>
<script>

shortcuts = {
    "scp" : "SC de Paardensprong",
    "ela" : "Eli Alia",
    "trn" : "toernooi",
    "scm" : "schaakmat",
    "tgs" : "tegenstander"
}

window.onload = function() {
    var ta = document.getElementById("body");
    var timer = 0;
    var re = new RegExp("\\b(" + Object.keys(shortcuts).join("|") + ")\\b", "g");

    update = function() {
        ta.value = ta.value.replace(re, function($0, $1) {
            return shortcuts[$1.toLowerCase()];
        });
    }

    ta.onkeydown = function() {
        clearTimeout(timer);
        timer = setTimeout(update, 200);
    }
}
</script>

@endsection
