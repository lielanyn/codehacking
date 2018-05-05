 @extends('layouts.admin')

@section('content')

	<h1>Create Posts</h1>

	{!! Form::open(array('method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true)) !!}

	{{ csrf_field() }}

	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('category_id', 'Category:') !!}
		{!! Form::select('category_id',[''=> 'Choose Options'] + $categories, null , ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('photo_id', 'Photo:') !!}
		{!! Form::file('photo_id', ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('bodu', 'Body:') !!}
		{!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Create Post', null, ['class'=>'btn btn-primary']) !!}
	</div>

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