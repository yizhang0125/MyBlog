@extends('layout.app')

@section('title', 'New Post')

@section('content')

<div class="container my-5">
    <h2 class="mb-4">Create a New Post</h2>
    
    <form action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image">Images</label>
            <div id="image-upload-fields">
                <div class="image-upload-group" id="upload-group-0" style="position: relative;">
                    <input type="file" name="images[]" id="image-upload-0" class="form-control" accept="image/*" onchange="previewImage(this, 0); showNextUploadField(1)">
                    <img id="preview-0" style="width: 200px; margin-top: 10px; display: none;">
                    <span class="remove-btn" id="remove-0" style="display:none;" onclick="removeUploadField(0)">×</span>
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Create Post</button>
        </div>
    </form>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/image-upload.js') }}"></script>
@endsection
