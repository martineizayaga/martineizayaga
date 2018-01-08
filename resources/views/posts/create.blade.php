@extends('main')

@section('title', 'New Post')

@section('stylesheets')

	{{ Html::style('css/parsley.css') }}
	{{ Html::style('css/select2-bootstrap.css') }}
	@include('partials._tinymce')
@endsection

@section('content')
	  	{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'class' => 'form-horizontal', 'files' => true)) !!}
		  	<div class="form-group">
				{{ Form::label('title', 'Title:', array('class' => 'col-xs-2 control-label')) }}
				<div class="col-xs-10">
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('slug', 'Slug:', array('class' => 'col-xs-2 control-label')) }}
				<div class="col-xs-10">
					{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('featured_image', "Image:", array('class' => 'col-xs-2 control-label')) }}
				<div class="col-xs-10">
					{{ Form::file('featured_image', array("accept" => "image/*")) }}
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('body', "Body:", array('class' => 'col-xs-2 control-label')) }}
				<div class="col-xs-10">
					{{ Form::textarea('body', null, array('class' => 'form-control')) }}
					
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-2">
				{{ Form::submit('Create Post', array('class' => 'form-control btn-submit', 'style' => 'margin-top: 20px;')) }}
			</div>
			
		{!! Form::close() !!}
		@include('mceImageUpload::upload_form')
@endsection

@section('scripts')
	{{ HTML::script('js/select2.min.js') }}
	{{ HTML::script('js/parsley.min.js') }}
	<script type="text/javascript">
		$('.select2-tags').select2();
	</script>

@endsection