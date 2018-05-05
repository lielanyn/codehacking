 @extends('layouts.admin')

@section('content')

	<h1>Edit Posts</h1>

	{!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=> true]) !!}

	{{ csrf_field() }}

	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('category_id', 'Category:') !!}
		{!! Form::select('category_id', $categories, null , ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('photo_id', 'Photo:') !!}
		{!! Form::file('photo_id', ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('body', 'Body:') !!}
		{!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Update Post', null, ['class'=>'btn btn-primary']) !!}
	</div>
	{!! Form::close() !!}

	{!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}

		<div class="form-group">
			{!! Form::submit('Delete Post', null, ['class'=>'btn btn-danger col-sm-6']) !!}
		</div>

	{!! Form::close() !!}

	@if(count($errors) > 0)

		<div class="alert alert-danger">
			
			<ul>

				@foreach($errors->all() as $error)

					<li>{{$error}}</li>

				@endforeach
				
			</ul>

		</div>

	@endif

@endsection