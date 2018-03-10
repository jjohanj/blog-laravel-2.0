

<div class="title"><a href="/posts/{{ $post->id}}">{{ $post->title }}</a></div><br>

<div class="category">category: {{ $post->category }}<br>
{{ $post->created_at->toFormattedDateString() }}, Autor: {{$post->user}}</div>


<br>
<div class="bodytext">{!! $post->body !!}</div><br>


<hr>
