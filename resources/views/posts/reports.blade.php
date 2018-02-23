@extends ('layouts.master')


@section ('content')
<button onclick="window.location.href = '/';">Home</button><br><hr>

  @foreach ($posts as $post)
    @include ('posts.posts')
  @endforeach
@endsection
