@extends ('layouts.master')

@section ('content')
<h2>Admin page </h2>
<button onclick="window.location.href = '/';">Home</button><hr>

<div id='admincomment'>
<strong> Delete comments </strong><br>
@foreach ($comments as $comment)
<form action="/posts/delete" method="post" id='deletereactions'>
  {{ method_field('DELETE') }}
  {{csrf_field()}}

  <input type="hidden" rows="5" placeholder="enter id to delete" name="id" type="text" value='{{ $comment->id }}'></input></br>
  <button  type="submit">Delete comment</button>
  </form
  <b>{{ $comment->id }}</b>
  {{ $comment->body }}

@endforeach
<br>

</div>
<div id='adminreaction'>
  <strong> Enable / disable comments </strong><br><br>
@foreach ($posts as $post)
  status: <b>{{ $post->controlcomments }}</b>
  id: <b>{{ $post->id }}</b>
  article: <b>{{ $post->title }}</b>
  <br>
@endforeach
<br>

<form action="/posts/update" method="post">
  {{ method_field('Patch') }}
  {{csrf_field()}}
  <input rows="5" placeholder="enter id to enable / disable commentsection" name="id" type="text" class='input' required></input></br>
  <input type="radio" name="value" value="1" checked> 1: Enalbe<br>
  <input type="radio" name="value" value="0"> 0: Disable<br>

  <button type="submit">Edit comment section</button>
</form>
</div>

@endsection
