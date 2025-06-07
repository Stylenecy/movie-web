@extends('layouts.main')
@section('title', 'Form Ubah Passwrord')
@section('content')
    <div class="container-fluid pt-4">
        <div class="card">
            <div class="card-header"></div>
            <div class="class-body">
                @if (session('info'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>{{ session('info') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="/updatepass" method="post">
                @csrf
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="konfirmasi_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
