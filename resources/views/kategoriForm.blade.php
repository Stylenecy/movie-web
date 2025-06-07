@extends('layouts.main')
@section('title', 'Form Kategori')
@section('content')
    <div class="container pt-4">
        <h4>Form Kategori</h4>
        <form action="/kategori/form" method="POST">
            @csrf

            <div class="form-group">
                <label for="kode">Kode Kategori:</label>
                <input type="number" name="kode" id="kode" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nama">Nama Kategori:</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Jenis:</label><br>
                <input type="radio" name="jenis" value="Barang" required> Barang
                <input type="radio" name="jenis" value="Jasa"> Jasa
            </div>

            <div class="form-group">
                <label for="departemen">Departemen:</label>
                <select name="departemen" id="departemen" class="form-control">
                    <option value="TI">Teknologi Informasi</option>
                    <option value="SI">Sistem Informasi</option>
                    <option value="MI">Manajemen Informatika</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
@endsection
