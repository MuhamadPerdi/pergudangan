@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Barang</h1>
    <a href="{{ route('admin.barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kategori</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Suplier</th>
                <th>Gerai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->suplier->nama }}</td>
                <td>{{ $item->gerai->nama }}</td>
                <td>
                    <a href="{{ route('admin.barang.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.barang.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection