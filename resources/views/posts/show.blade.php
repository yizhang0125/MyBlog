@extends('layout.app')

@section('title', $post->title)

@section('content')
<div class="container my-5">
    <h1 class="mb-4">{{ $post->title }}</h1>
    <p class="lead mb-4">{{ $post->content }}</p>

    @if($post->image)
        <div class="row">
            @foreach($post->image as $image)
                <div class="col-md-4 mb-4">  <!-- Change to col-md-4 for three columns -->
                    <figure class="figure">
                        <img src="../{{ $image->image }}" alt="Post Image" class="figure-img img-fluid rounded" style="max-width: 100%; height: auto;">
                    </figure>
                </div>  
            @endforeach
        </div>
    @endif
</div>
@endsection
