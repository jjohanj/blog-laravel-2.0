@extends ('layouts.master')

<h2> Johan's Blog 2.0</h2>
@include ('layouts/app')
@section ('content')

  <h3>{{ $posts->title }}</h3>

  <div id="showscreen">
@guest
  @else

     @if( Auth::user()->email == 'johanjorritsma@hotmail.com')
     <button class='alternativebutton'>Edit blog post</button><br><br>
     <div id='editfield'>
      <form action="/posts/edit" method="post">
      {{ method_field('Patch') }}
      {{csrf_field()}}


      <b>Title: </b><input value='{{ $posts->title }}' name='title'>
      <input type='hidden' id='id' name='id' value='{{ $posts->id }}'>
      <textarea id='body' name='body'>
      {!! $posts->body !!}
      </textarea>
      <b>Category:</b> @foreach ($categories as $category)
          <input type="radio" name="category" value="{{ $category->category }}" checked> {{ $category->category }}
        @endforeach<br>
      <button class='menubutton2' type=submit>Save changes</button>
      <hr><br>
    </form>
    </div>
    @endif

@endguest

{!! $posts->body !!}
<hr>

@guest

@foreach ($posts->comments as $comment)
<div class="comments">
  {{ $comment->user }}:
  {{ $comment->body }}
</div>
@endforeach

  @else
    @if( Auth::user()->email == 'johanjorritsma@hotmail.com')
      @foreach ($posts->comments as $comment)
        <div>
          <form action="/posts/delete" method="post" id='deletereactions'>
            {{ method_field('DELETE') }}
            {{csrf_field()}}

            <input type="hidden" rows="5" placeholder="enter id to delete" name="id" type="text" value='{{ $comment->id }}'></input></br>
            <button  class='fa fa-trash' type="submit"></button>
          </form>
          {{ $comment->user }}:
          {{ $comment->body }}
      @endforeach

      @else

      @foreach ($posts->comments as $comment)
      <div class="comments">
        {{ $comment->user }}:
        {{ $comment->body }}
      </div>
      @endforeach



    @endif

@endguest

@guest

  <hr>
  <button class='alternativebutton' onclick="window.location.href = '/login';">Login to comment</button>
  <hr>
@else
@if ($posts->controlcomments == 1)
<hr>

<form action="/post/{{ $posts->id }}/comments" method="POST">
  {{csrf_field()}}
  <input placeholder="comment here" name="body" type="text" id="body" required></input>
  <input placeholder="user" type="hidden" name="user" type="text" value="{{ Auth::user()->name }}" required></input>
  <input placeholder="user" type="hidden" name="post_id" type="text" value="{{ $posts->id }}" required></input>
  <button class='menubutton2' type="submit">send</button>
</form>

@endif

@endguest
<br>

</div>
<script>
src="jquery-3.3.1.min.js"
$(".alternativebutton").click(function() {
    $("#editfield").toggle();
});
<<<<<<< HEAD

=======
>>>>>>> develop
</script>
<hr>
@endsection
