@extends ('layouts.master')

@section ('content')

  <h2>{{ $posts->title }}</h2>
  <br>
  {{ $posts->body }}
  <hr><br>
  @foreach ($posts->comments as $comment)

  <div>
    {{ $comment->body }}
  </div>
@endforeach

<br><hr>
<form action="/post/{{ $posts->id }}/comments" method="POST">
  {{csrf_field()}}

  <textarea rows="5" placeholder="comment here" name="body" type="text" id="body"></textarea></br>
  <button type="submit">Submit comment!</button>
</form>
<br>
<button onclick="window.location.href = '/';">Home</button>

@endsection
