@extends ('layouts.master')

@section ('content')

<h2>Admin page </h2>
<button onclick="window.location.href = '/';">Home</button>
<button onclick="window.location.href = '/admin-comments';">Admin comments</button>
<br><hr>

<div class='admincomment'>
  <strong> Enable / disable comments </strong><br><br>
  @foreach ($posts as $post)
    id: <b>{{ $post->id }}</b>
    status: <b>{{ $post->controlcomments }}</b>
    article: <b>{{ $post->title }}</b>
    <br>
  @endforeach
<br>

<form action="/posts/update" method="post">
  {{ method_field('Patch') }}
  {{csrf_field()}}
  <input rows="5" placeholder="enter id to enable / disable commentsection" name="id" type="text" class='input' autocomplete="off" required ></input></br>
  <input type="radio" name="value" value="1" checked> 1: Enalbe<br>
  <input type="radio" name="value" value="0"> 0: Disable<br>

  <button type="submit">Edit comment section</button>
</form>
</div>

@endsection