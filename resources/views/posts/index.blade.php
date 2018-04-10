@extends('layouts.app')
@section('content')
	<h1>Posts</h1>

	@if(count($posts) > 0)
		@foreach($posts as $post)
			<div class="well">
				<div class="row">
					<div class="col-md-8 col-sm-8">
						<h4>
							<a href="/posts/{{ $post->id }}">{{ $post->id }}: {{ $post->name }}</a><br>
							<small><em>Written on {{ date('M dS, Y', strtotime($post->created_at)) }}, by {{ $post->user->name }}</em></small>
						</h4>
						<p>{{ $post->message }}</p>


						{{-- for logged in users --}}
						@if ( !Auth::guest() && $post->user->id == Auth::user()->id)
							<a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit Post</a>

							{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right' ])!!}
								{{ Form::hidden('_method', 'DELETE')}}
								{{ Form::submit('Delete Post', ['class' => 'btn btn-danger']) }}
							{!!Form::close()!!}
						@endif
					</div>
				</div>
			</div>
		@endforeach

		<!-- Pagination links -->
		{{ $posts->links() }}
	@else
		<p>No posts found</p>
	@endif
@endsection