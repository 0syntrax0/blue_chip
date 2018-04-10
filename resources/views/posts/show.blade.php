@extends('layouts.app')
@section('content')
	<a href="/posts" class="btn btn-default">Go Back</a>
	<h1>
		{{ $post->title}}
	</h1>

	<div>
		{{ $post->message }}
	</div>
	<hr>
	<small><em>Written on {{ date('M dS, Y', strtotime($post->created_at)) }}, by {{ $post->user->name }}</em></small>
	<hr>

	<!-- for un-logged in users -->
	@if ( !Auth::guest() && $post->user->id == Auth::user()->id)
		<a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit Post</a>

		{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right' ])!!}
			{{ Form::hidden('_method', 'DELETE')}}
			{{ Form::submit('Delete Post', ['class' => 'btn btn-danger']) }}
		{!!Form::close()!!}
	@endif
@endsection