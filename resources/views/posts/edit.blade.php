@extends('main')

@section('title', 'Edit Blog Post')

@section('stylesheets')
	
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.css') !!}
	@include('partials._tinymce')
@endsection

@section('content')
<div class="edit-container">
	<main class="form">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true]) !!}
			
		  	<fieldset>
		  		<div class="form-group">
					{{ Form::label('title', 'Title:', array('class' => 'col-xs-2 control-label')) }}
					<div class="col-xs-10">
			  			{{ Form::text('title', null, array('class' => 'form-control')) }}
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
			  		{{ Form::label('body', 'Body:', array('class' => 'col-xs-2 control-label')) }}
			  		<div class="col-xs-10">
						{{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}
					</div>
				</div>
				<div class="col-xs-2">
					{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn-warning')) !!}
				</div>
				<div class="col-xs-10">
					{{ Form::submit('Save Changes', array('class' => 'btn-submit form-control')) }}
				</div>
			</fieldset>
		{!! Form::close() !!}
		@include('mceImageUpload::upload_form')
	</main>
</div>
@endsection

@section('scripts')

	<script type="text/javascript" src="js/select2.min.js"></script>
	<script type="text/javascript" src="js/parsley.min.js"></script>

	<script type="text/javascript">
		$('.select2-tags').select2();
	</script>

@endsection