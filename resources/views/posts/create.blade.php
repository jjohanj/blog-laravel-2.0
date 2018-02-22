@extends ('layouts.master')

@section ('content')
  <h2>Create a Post!</h2>

  <div id="form">
    <form action="/posts" method="POST">
      {{csrf_field()}}
      <input placeholder="Title" name="title" type="text" id="title"></br>
      <textarea rows="5" placeholder="Blog text" name="body" type="text" id="body"></textarea></br>
      <button type="submit">Submit Blog!</button></br>
    </form>
  </div>

@include('layouts.errors')

@endsection