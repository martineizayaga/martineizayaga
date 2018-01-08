@extends('main')

@section('title', 'All Tags')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.css') !!}

@endsection

@section('content')

	<h1>Categories</h1>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tags as $tag)
			<tr>
				<th>{{ $tag->id }}</th>
				<td>{{ $tag->name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
		{!!Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
			<h2>New Tag</h2>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name', null, ['class' => 'form-control']) }}

			{{ Form::submit('Create New Tag', ['class' => 'btn-success'])}}
		{!! Form::close() !!}
	

@endsection

@section('scripts')
	
	<script type="text/javascript" src="js/select2.min.js"></script>
	<script type="text/javascript" src="js/parsley.min.js"></script>

@endsection