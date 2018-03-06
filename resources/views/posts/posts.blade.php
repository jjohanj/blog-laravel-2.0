

<div class="title"><a href="/posts/{{ $post->id}}">{{ $post->title }}</a></div>
<br>
<div class="timestamp">{{ $post->created_at->toFormattedDateString() }}</div>
<div class="category">category: {{ $post->category }}</div>
<br>
<div class="bodytext">{!! $post->body !!}</div>

<hr>
