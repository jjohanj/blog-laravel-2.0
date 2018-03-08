@extends ('layouts.master')


<h2>Admin page </h2>
@include ('layouts/app')
@section ('content')
<button onclick="window.location.href = '/posts/create';">Create</button>
<button onclick="window.location.href = '/admin-articles';">Admin articles</button>
<br><hr>

<div class='admincomment'>
<strong> Delete comments </strong><br>
@foreach ($comments as $comment)
<form action="/posts/delete" method="post" id='deletereactions'>
  {{ method_field('DELETE') }}
  {{csrf_field()}}

  <input type="hidden" rows="5" placeholder="enter id to delete" name="id" type="text" value='{{ $comment->id }}'></input></br>
  <button  type="submit" class='alternativebutton'>Delete</button>
</form>

  {{ $comment->body }}

@endforeach
<br><hr>

</div>


@endsection
