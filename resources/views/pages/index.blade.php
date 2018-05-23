@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome! to Amaiiapp</h1>
        <p>This is the Amaiiapp created with Laravel Youtube series by Traversy Media!</p>
        @if(Auth::guest())
            <p><a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a> <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Register</a></p>
        @endif
    </div>
@endsection
