@extends('layouts.main')
@section('title', 'Edit Movie')
@section('content')
    <div class="container-field pt-3">
        <div class="card">
            <div class="card-body">
                <form action="/update/{{ $id_movie->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="ImDB" class="form-label">ImDB</label>
                        <input type="text" name="ImDB" class="form-control" id="ImDB" value="{{ $id_movie->ImDB }}" required>
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $id_movie->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" min="1900" max="2100" name="year" class="form-control" id="year" value="{{ $id_movie->year }}" required>
                    </div>
                    <div class="form-group">
                        <label for="genre" class="form-label">Genre</label>
                        <select name="genre" class="form-control">
                            <option value="0">--Pilih Genre--</option>
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Comedy">Comedy</option>
                            <option value="Drama">Drama</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Horror">Horror</option>
                            <option value="Mystery">Mystery</option>
                            <option value="Romance">Romance</option>
                            <option value="Sci-Fi">Sci-Fi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Poster</label>
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$id_movie->poster) }}" width="120px" alt="Poster">
                        </div>
                        <input
                            type="file"
                            accept="image/*"
                            class="form-control-file"
                            id="poster"
                            name="poster"
                            >
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>
@endsection
