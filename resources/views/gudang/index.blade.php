@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Halaman Gudang</h1>
    <form action="{{ route('gudang.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Nama Barang" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Suplier</th>
                <th>Gerai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $item)
            <tr>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->suplier->nama }}</td>
                <td>{{ $item->gerai->nama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection