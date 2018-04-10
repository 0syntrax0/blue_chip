@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary">Create New Post</a>
                    <h3>Your Posts</h3>

                    @if (count($posts) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->name }}</td>
                                        <td>
                                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right' ])!!}
                                                {{ Form::hidden('_method', 'DELETE')}}
                                                {{ Form::submit('Delete Post', ['class' => 'btn btn-danger']) }}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>                        
                        </table>
                    @else
                        <p class="text-mute">You have no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
