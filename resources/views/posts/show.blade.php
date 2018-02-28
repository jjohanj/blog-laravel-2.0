@extends ('layouts.master')
<h2> Johan's Blog 2.0</h2>
@section ('content')

  <h3>{{ $posts->title }}</h3>
  <br>
  <div id="showscreen">
  {!! $posts->body !!}

  <hr><br>

@foreach ($posts->comments as $comment)
  <div class="comments">
    {{ $comment->body }}
  </div>
@endforeach



@if ($posts->controlcomments == 1)
<br><hr>

<form action="/post/{{ $posts->id }}/comments" method="POST">
  {{csrf_field()}}
  <input placeholder="comment here" name="body" type="text" id="body" required></input></br>
  <button type="submit">Submit comment!</button>
</form>
@endif

<br>
<button onclick="window.location.href = '/';">Home</button>
</div>

@endsection
