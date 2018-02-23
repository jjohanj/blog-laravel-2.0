

<a href="/posts/{{ $post->id}}">
  {{ $post->title }}
</a>
<br>
{{ $post->created_at->toFormattedDateString() }}
<br>
{{ $post->body }}
<br>
{{ $post->category}}
<hr><br>
