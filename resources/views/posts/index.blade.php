@extends ('layouts.master')


@section ('content')
  @foreach ($posts as $post)
    @include ('posts.posts')
  @endforeach
@endsection
