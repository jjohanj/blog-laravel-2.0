@extends ('layouts.master')

@section ('content')


<h2>Screen for the submitting a blog post</h2>
<button onclick="window.location.href = '/';">Home</button><br>
<hr>
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

@endsection
