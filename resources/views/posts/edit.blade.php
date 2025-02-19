@extends('layout.app')

@section('title', 'Edit Post')

@section('content')

<div class="container my-5">
    <h2 class="mb-4">Edit Post</h2>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control" required>{{ $post->content }}</textarea>
        </div>

        @if($post->image)
        <div class="row">
            @foreach($post->image as $image)
                <div class="col-md-4">
                    <figure class="figure">
                        <img src="{{ asset($image->image) }}" alt="Post Image" class="figure-img img-fluid rounded" style="width: 100%; height: auto; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <figcaption class="figure-caption text-center">
                            <label for="remove_images">
                                <input type="checkbox" name="remove_images[]" value="{{ $image->id }}"> Remove
                            </label>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
        </div>
        @endif

        <div class="form-group mb-3">
            <label for="image">Images</label>
            <div id="image-upload-fields">
                <div class="image-upload-group" id="upload-group-0" style="position: relative;">
                    <input type="file" name="images[]" id="image-upload-0" class="form-control" accept="image/*" onchange="previewImage(this, 0); showNextUploadField(1)">
                    <img id="preview-0" style="width: 150px; margin-top: 10px; display: none; position: relative; border: 1px solid #ddd; padding: 5px;">
                    <span class="remove-btn" id="remove-0" style="display:none; position: absolute; top: 10px; right: 10px; background-color: red; color: white; padding: 2px 5px; cursor: pointer;">×</span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Post</button>
        </div>
    </form>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/image-upload.js') }}"></script>
@endsection
