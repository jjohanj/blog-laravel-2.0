@extends ('layouts.master')

  @foreach ($posts as $post)
    @include ('posts.posts')
  @endforeach
