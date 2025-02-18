@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Suplier</h1>
    <form action="{{ route('admin.suplier.update', $suplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $suplier->nama }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $suplier->alamat }}" required>
        </div>
        <div class="form-group">
            <label for="kota">Kota</label>
            <input type="text" name="kota" class="form-control" value="{{ $suplier->kota }}" required>
        </div>
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $suplier->telepon }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection