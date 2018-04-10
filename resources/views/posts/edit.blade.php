@extends('layouts.app')
@section('content')
	<h1>Edit Post</h1>

	{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		<div class="form-group">
			{{ Form::label('name', 'Mame') }}
			{{ Form::text('name', $post->name, ['class' => 'form-control', 'placeholder' => 'Your Name'])}}
		</div>

		<div class="form-group">
			{{ Form::label('message', 'Message') }}
			{{ Form::textarea('message', $post->message, ['class' => 'form-control', 'placeholder' => 'Your Message'])}}
		</div>

		<div class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email', $post->email, ['class' => 'form-control', 'placeholder' => 'Your Email'])}}
		</div>

		{{ Form::hidden('_method', 'PUT') }}
		{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
	{!! Form::close() !!}
@endsection