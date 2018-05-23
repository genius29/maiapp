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

                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    @if(count($posts) > 0)
                        <h3>Your Blog Posts</h3>
                        <table class="table table-striped">
                            <tr>
                                <th><em>Title</em></th>
                                <th><em>Edit</em></th>
                                <th><em>Delete</em></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td><a href="/posts/{{$post->id}}">{{ $post->title }}</a></td>
                                    <td><a href="posts/{{$post->id}}/edit" class="btn btn-primary">Edit<a></td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are Your sure deleting this POST?")'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <hr>
                        <div class="alert alert-danger">
                            <p>OOPS!! You have NO posts yet.</p>
                            <p>Tap the Blue button now, to Create one.</p>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
