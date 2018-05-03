 @extends('layouts.admin')

@section('content')

	<h1>Edit Users</h1>

	<div class="col-sm-3">

		<img src="{{$user->photo->file}}" class="img-responsive img-rounded">

	</div>

	<div class="col-sm-9">

		{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=> true]) !!}

		{{ csrf_field() }}

		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Email Address:') !!}
			{!! Form::email('email', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('role_id', 'Role:') !!}
			{!! Form::select('role_id', $roles, null , ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('is_active', 'Status:') !!}
			{!! Form::select('is_active',array(1 => 'Active', 0 => 'Not Active'), null , ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('photo_id', 'Photo:') !!}
			{!! Form::file ('photo_id', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password:') !!}
			{!! Form::password('password', ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Create User', null, ['class'=>'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

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