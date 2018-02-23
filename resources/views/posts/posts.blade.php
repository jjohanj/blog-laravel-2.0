

<div class="title"><a href="/posts/{{ $post->id}}">{{ $post->title }}</a></div>
<br>
<div class="timestamp">{{ $post->created_at->toFormattedDateString() }}</div>
<br>
<div class="bodytext">{{ $post->body }}</div>
<br>
<div class="category">{{ $post->category}}</div>
<hr><br>
