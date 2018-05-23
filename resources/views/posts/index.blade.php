@extends('layouts.app')

@section('content')
    <h1>Posts</h1>;
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <p>{!!$post->body!!}</p>
                <hr>
                <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
            </div>
        @endforeach
        <div class="text-right">
            {{$posts->links()}}
        </div>
    @else
        <p class="alert alert-danger">NO posts found</p>
    @endif
@endsection