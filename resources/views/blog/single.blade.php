@extends('main')

@section('title')
	{{ $post->title }}
@endsection

@section('content')
	<article itemscope itemtype="https://schema.org/BlogPosting">
		@if(!empty($post->image))
			<img src="{{ asset('img/' . $post->image) }}" height="auto" width="100%">
		@endif
		<h1 itemprop="headline">{{ $post->title }}</h1>
		<span itemprop="dateModified" class="post-date">{{ date('M j, Y h:ia', strtotime($post->updated_at)) }} | {{ $post->time_to_read < 1 ? "< 1" : $post->time_to_read }} minute read</span>
		<hr>
		{!! $post->body !!}
	</article>
@endsection