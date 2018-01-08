@extends('main')

@section('title', 'View Post')

@section('content')

<div class="edit-container">
	<h1>{{ $post->title }}</h1>
	<div class="view-post-container">
		<p class="lead">{!! $post->body !!}</p>
	</div>
	<aside class="edit-info">
		<dl class="dl-horizontal view-post-info">
			<dt>Url:</dt>
			<dd><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></dd>
			<dt>Created At:</dt>
			<dd>{{ date('M d, Y, h:ia', strtotime($post->created_at)) }}</dd>
			<dt>Last Updated:</dt>
			<dd>{{ date('M d, Y, h:ia', strtotime($post->updated_at)) }}</dd>
		</dl>
	</aside>
	{{ Html::linkRoute('posts.index', '‹ See All Posts', [], ['class' => 'btn-link']) }}
	{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn-info')) !!}
	{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
		{!! Form::submit('Delete', array('class' => 'btn-warning')) !!}
	{!! Form::close() !!}
</div>
@endsection