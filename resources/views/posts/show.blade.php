@extends ('layouts.master')

@section ('content')

  <h2>{{ $posts->title }}</h2>
  <br>
  <div id="showscreen">
  {{ $posts->body }}

  <hr><br>

@foreach ($posts->comments as $comment)
  <div id="comments">
    {{ $comment->body }}
  </div>
@endforeach



@if ($posts->controlcomments == 1)
<br><hr>

<form action="/post/{{ $posts->id }}/comments" method="POST">
  {{csrf_field()}}
  <textarea rows="5" placeholder="comment here" name="body" type="text" id="body" required></textarea></br>
  <button type="submit">Submit comment!</button>
</form>
@endif

<br>
<button onclick="window.location.href = '/';">Home</button>
</div>

@endsection
