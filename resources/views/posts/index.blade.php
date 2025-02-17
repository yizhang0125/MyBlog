@extends('layout.app')
@section('title', 'Blog Posts')
@section('content')

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h2 fw-bold m-0"><i class="fas fa-newspaper me-2 text-primary"></i>Latest Posts</h2>
        <a href="{{ route('new_post') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i>Create New Post
        </a>
    </div>

    @if($posts->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
            <p class="lead text-muted">No posts available yet. Be the first to create one!</p>
            <a href="{{ route('new_post') }}" class="btn btn-primary">Create Post</a>
        </div>
    @else
        <div class="row g-4">
            @foreach($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        @if($post->image && $post->image->first())
                            <img src="{{ asset($post->image->first()->image) }}" class="card-img-top" alt="Post Image" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $post->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($post->content, 100) }}</p>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-book-reader me-1"></i>Read More
                                </a>
                                <div class="btn-group">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('posts.delete', $post->id) }}" class="btn btn-outline-danger btn-sm" 
                                       onclick="return confirm('Are you sure you want to delete this post?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
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
