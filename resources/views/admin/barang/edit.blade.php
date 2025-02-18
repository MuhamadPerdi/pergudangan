@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Barang</h1>
    <form action="{{ route('admin.barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ $barang->kategori }}" required>
        </div>
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $barang->harga }}" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $barang->stok }}" required>
        </div>
        <div class="form-group">
            <label for="suplier_id">Suplier</label>
            <select name="suplier_id" class="form-control" required>
                @foreach($suplier as $s)
                <option value="{{ $s->id }}" {{ $barang->suplier_id == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="gerai_id">Gerai</label>
            <select name="gerai_id" class="form-control" required>
                @foreach($gerai as $g)
                <option value="{{ $g->id }}" {{ $barang->gerai_id == $g->id ? 'selected' : '' }}>{{ $g->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection