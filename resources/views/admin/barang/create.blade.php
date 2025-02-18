@extends('layouts.app')

@section('title', 'Tambah Barang')
@section('header_title', 'Tambah Barang')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Form Tambah Barang</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.barang.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">ID Barang</label>
                <input type="text" name="id_barang" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="suplier_id" class="form-label">Suplier</label>
                <select name="suplier_id" class="form-select" required>
                    <option value="">--Pilih--</option>
                    @foreach($suplier as $s)
                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection