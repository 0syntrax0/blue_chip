@extends('layouts.app')
@section('content')
	<h1>Create Post</h1>

	{{-- Get logged in user's details --}}
	@guest
		@php
			$name = '';
			$email = '';
		@endphp
	@else
		@php
			$name = Auth::user()->name;
			$email= Auth::user()->email;
		@endphp
	@endguest


	{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', $name, ['class' => 'form-control', 'placeholder' => 'Your Name'])}}
		</div>

		<div class="form-group">
			{{ Form::label('message', 'Message') }}
			{{ Form::text('message', '', ['class' => 'form-control', 'placeholder' => 'Your Message'])}}
		</div>

		<div class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email', $email, ['class' => 'form-control', 'placeholder' => 'Your Email'])}}
		</div>

		{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
	{!! Form::close() !!}
@endsection