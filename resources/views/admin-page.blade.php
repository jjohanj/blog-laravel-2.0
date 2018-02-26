@extends ('layouts.master')

@section ('content')
<h2> All comments </h2>
<button onclick="window.location.href = '/';">Home</button><hr>

@foreach ($comments as $comment)
  @include ('posts.comments')
@endforeach
<hr>

<div class='bodytext'>
<form action="/posts/delete" method="post">
  {{ method_field('DELETE') }}
  {{csrf_field()}}

  <input rows="5" placeholder="enter id to delete" name="id" type="text" id="body" required></input></br>
  <button type="submit">Delete comment</button>

</form>
</div>
@endsection
