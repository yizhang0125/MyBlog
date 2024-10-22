@extends('layout.app')
@section('title', 'The Post')
@section('content')

<div class="container my-4">
    <h2 class="h2 font-weight-bold">My Post</h2>

    @if($posts->isEmpty())
        <p class="text-muted">No Posts available</p>
    @else
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ $post->image ? $post->image->first()->image : '' }}" class="card-img-top" alt="Post Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->content, 100) }}</p>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
                                <div class="btn-group">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('posts.delete', $post->id) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
