@extends('layouts.main')
@section('title', 'Movie')
@section('content')
    <div class="container-field pt-3">
        <div class="card">
            <div class="card-header">
                <a href="/movie/form-movie" class="btn btn-primary"><i class="bi bi-plus-square"></i> Movie </a>
            </div>
            <div class="card-body"></div>
            @if (session('alert'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('alert') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="display" id="example" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ImDB</th>
                        <th>Title</th>
                        <th>Year</th>
                        <th>Genre</th>
                        <th>Poster</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mv as $idx => $m)
                        <tr>
                            <td>{{ $idx + 1 }}</td>
                            <td>{{ $m->ImDB }}</td>
                            <td>{{ $m->title }}</td>
                            <td>{{ $m->year }}</td>
                            <td>{{ $m->genre }}</td>
                            <td><img src="{{ asset('storage/' . $m->poster) }}" width="120px"></td>
                            <td>
                                <a href="/movie/edit-movie/{{ $m->id }}" class="btn btn-outline-success btn-sm">
                                    <i class="bi bi-pencil-square"></i></a>
                                <a href="/delete/{{ $m->id }}" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-trash"></i></a>
                            </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
