@extends ('layouts.master')



<h2>Screen for the submitting a blog post</h2>
@include ('layouts/app')
@section ('content')

<div id='createscreen'>
<button onclick="window.location.href = '/admin-comments';">Admin comments</button>
<button onclick="window.location.href = '/admin-articles';">Admin articles</button><br><hr>

<h3>Create a Post!</h3>


<div id="form">
  <form action="/posts/create/category" method="POST">
    {{csrf_field()}}
    <button type="submit">Add a new category:</button>
    <input placeholder="new category name" name="addcategory" type="text" id="addcategory"><br><hr>
<form>

<div id="form">
  <form action="/posts" method="POST">
    {{csrf_field()}}
    <b>Title:</b> <input placeholder="Title" name="title" type="text" id="title"><hr>
    <b>Category:</b> @foreach ($categories as $category)
        <input type="radio" name="category" value="{{ $category->category }}" checked> {{ $category->category }}
      @endforeach
      <div id="form">

      </div><br><br>
    <input type="hidden" name="comments" value="1">
    <textarea rows="5" placeholder="Blog text" name="body" type="text" id="body"></textarea><br>
    <button type="submit">Submit Blog!</button><br>
  </form>
</div>

@include('layouts.errors')


@endsection
