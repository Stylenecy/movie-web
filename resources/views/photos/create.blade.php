@extends('layouts.main')
@section('title', 'Add New Photo')
@section('content')
<style>
    .futuristic-photo-preview {
        width: 100%;
        max-width: 320px;
        height: 180px;
        object-fit: cover;
        border-radius: 1.2em;
        box-shadow: 0 2px 16px #a259ff33;
        margin-bottom: 1em;
        display: none;
        background: #22223b;
    }
</style>
<div class="container-field pt-3">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <img id="photoPreview" class="futuristic-photo-preview" src="#" alt="Photo Preview">
                    <input type="file" accept="image/*" name="photo" class="form-control-file @error('photo') is-invalid @enderror" id="photo" required onchange="previewPhoto(event)">
                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function previewPhoto(event) {
        const input = event.target;
        const preview = document.getElementById('photoPreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
@endsection
