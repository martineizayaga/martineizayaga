@extends('main')

@section('title', '| All Posts')

@section('content')
			<div class="index-header">
			<h1>All Posts</h1>
			<a href="{{ route('posts.create') }}" class="create-new-post">Create New Post</a>
			</div>
			<hr>
				<table id="posts-table">
					<thead>
						<th>Title</th>
						<th class="table-body">Body</th>
						<th>Created</th>
						<th></th>
					</thead>
					<tbody>
						@foreach($posts as $post)
							<tr>
								<td><a href={{ '/blog/' . $post->slug }}>{{ $post->title }}</a></td>
								<td class="table-body">{{ substr(strip_tags($post->body), 0, 30) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
								<td class="post-date">{{ date('m/d/y', strtotime($post->created_at)) }}</td>
								<td><a href="{{ route('posts.edit', $post->id) }}">Edit</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{{ $posts->links() }}
				</div>

	</div>

@endsection