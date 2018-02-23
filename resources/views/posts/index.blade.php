@extends ('layouts.master')


@section ('content')
@include ('layouts.nav')
  @foreach ($posts as $post)
    @include ('posts.posts')
  @endforeach
@endsection
