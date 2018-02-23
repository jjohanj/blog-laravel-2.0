@extends ('layouts.master')


@section ('content')
<div id='menu'>
<button onclick="window.location.href = 'posts/create';">Create blog</button>
<button onclick="window.location.href = 'posts/reports';">Show all reports</button>
<button onclick="window.location.href = 'posts/results';">Show all results</button>
<hr>
</div>
  @foreach ($posts as $post)
    @include ('posts.posts')
  @endforeach
@endsection
