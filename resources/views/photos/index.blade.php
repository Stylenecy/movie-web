@extends('layouts.main')
@section('title', 'Photos')
@section('content')
<style>
    .futuristic-photos-bg {
        background: radial-gradient(ellipse at top left, #2b2b4b 0%, #0a0a0f 100%);
        min-height: 80vh;
        padding-bottom: 2em;
    }
    .futuristic-photos-card {
        background: rgba(30, 30, 60, 0.8);
        border-radius: 2rem;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1.5px solid rgba(255,255,255,0.12);
        padding: 2.5rem 2rem 2rem 2rem;
        margin: 2rem auto;
        max-width: 1200px;
        width: 100%;
    }
    .futuristic-photos-title {
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(90deg, #fff 20%, #a259ff 60%, #ff3864 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
        margin-bottom: 1.2em;
        letter-spacing: 1.5px;
        text-align: center;
    }
    .futuristic-add-btn {
        background: linear-gradient(90deg, #a259ff 0%, #ff3864 100%);
        color: #fff !important;
        border: none;
        border-radius: 2em;
        padding: 0.7em 2em;
        font-weight: 700;
        font-size: 1.1em;
        box-shadow: 0 2px 16px #a259ff33;
        transition: background 0.2s, box-shadow 0.2s;
        margin-bottom: 1.5em;
    }
    .futuristic-add-btn:hover {
        background: linear-gradient(90deg, #ff3864 0%, #a259ff 100%);
        box-shadow: 0 4px 24px #ff386455;
    }
    .futuristic-table {
        background: rgba(30, 30, 60, 0.7);
        color: #fff;
        border-radius: 1.2em;
        overflow: hidden;
        margin-top: 1em;
    }
    .futuristic-table th {
        background: linear-gradient(90deg, #a259ff 0%, #ff3864 100%);
        color: #fff;
        font-weight: 700;
        border: none;
    }
    .futuristic-table td {
        background: transparent;
        color: #bdbdf7;
        border: none;
        vertical-align: middle;
    }
    .futuristic-action-btn {
        border-radius: 1.5em;
        padding: 0.4em 1.2em;
        font-weight: 600;
        font-size: 1em;
        border: none;
        margin-right: 0.3em;
        background: linear-gradient(90deg, #a259ff 0%, #ff3864 100%);
        color: #fff;
        transition: background 0.2s, box-shadow 0.2s;
    }
    .futuristic-action-btn:hover {
        background: linear-gradient(90deg, #ff3864 0%, #a259ff 100%);
        box-shadow: 0 2px 12px #ff386455;
    }
    /* DataTables Controls Styling - Enhanced for Readability */
    .dataTables_length label, .dataTables_filter label {
        color: #fff !important;
        font-weight: 700;
        font-size: 1.12em;
        letter-spacing: 0.5px;
        text-shadow: 0 2px 8px #000, 0 0 2px #a259ff;
    }
    .dataTables_length select, .dataTables_filter input {
        background: rgba(30, 30, 60, 0.95) !important;
        color: #fff !important;
        border: 2px solid #fff !important;
        border-radius: 1.5em;
        padding: 0.5em 1.2em;
        margin-left: 0.5em;
        margin-right: 0.5em;
        font-size: 1.08em;
        outline: none;
        box-shadow: 0 2px 8px #a259ff55, 0 0 2px #fff;
        font-weight: 600;
        transition: border 0.2s, box-shadow 0.2s;
    }
    .dataTables_length select:focus, .dataTables_filter input:focus {
        border: 2px solid #ff3864 !important;
        background: rgba(30, 30, 60, 1) !important;
        box-shadow: 0 0 12px #ff3864cc, 0 0 2px #fff;
    }
    .dataTables_info {
        color: #bdbdf7 !important;
        font-size: 1em;
        margin-top: 0.5em;
    }
    .dataTables_paginate .paginate_button {
        background: rgba(30, 30, 60, 0.7) !important;
        color: #fff !important;
        border: 1.5px solid #a259ff !important;
        border-radius: 1.2em !important;
        margin: 0 0.2em;
        padding: 0.3em 1em !important;
        font-weight: 600;
        transition: background 0.2s, color 0.2s;
    }
    .dataTables_paginate .paginate_button.current, .dataTables_paginate .paginate_button:hover {
        background: linear-gradient(90deg, #a259ff 0%, #ff3864 100%) !important;
        color: #fff !important;
        border: 1.5px solid #ff3864 !important;
    }
</style>
<div class="futuristic-photos-bg">
    <div class="futuristic-photos-card">
        <div class="futuristic-photos-title">Your Photo Gallery</div>
        <a href="{{ route('photos.create') }}" class="btn futuristic-add-btn"><i class="bi bi-plus-square"></i> Add Photo </a>
        @if (session('alert'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('alert') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="table-responsive">
            <table class="display futuristic-table" id="example" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($photos as $idx => $photo)
                        <tr>
                            <td>{{ $idx + 1 }}</td>
                            <td><img src="{{ asset($photo->file_path) }}" width="120px" style="border-radius:1em;box-shadow:0 2px 12px #a259ff33;"></td>
                            <td>{{ $photo->title }}</td>
                            <td>{{ $photo->description }}</td>
                            <td>
                                <a href="{{ route('photos.edit', $photo) }}" class="futuristic-action-btn">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('photos.destroy', $photo) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="futuristic-action-btn" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
