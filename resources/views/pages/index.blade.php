@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center">
        <h1>{{ $title }}</h1>
        <p>This is the main page</p>
        <p>
            <a href="#" class="btn btn-default btn-lg">Login</a> 
            <a href="#" class="btn btn-success btn-lg">Register</a>
        </p>
    </div>
@endsection