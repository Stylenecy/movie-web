@extends('layouts.main')
@section('title', 'Form Add Movie')
@section('content')
    <div class="container-field pt-3">
        <div class="card">
            <div class="card-body">
                <form action="/save" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="ImDB" class="form-label">ImDB</label>
                        <input type="text" name="ImDB" class="form-control" id="ImDB" required>
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" min="1900" max="2100" name="year" class="form-control" id="year" required>
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
                        <input type="file" accept="image/*" name="poster" class="form-control-file" id="poster" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>
@endsection
