@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-primary">Back</a>
    <hr>
    <h1>{{$post->title}}</h1>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on: {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user->id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
            
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are Your sure deleting this POST?")'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection