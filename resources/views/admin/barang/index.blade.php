@extends('layouts.app')
@section('title', 'Barang')
@section('header_title', 'Barang')

@section('header_buttons')
    <a href="{{ route('admin.barang.create') }}" class="btn btn-primary btn-round">Add Product</a>
@endsection

@section('content')
    <div class="form-group mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Cari barang...">
    </div>
    <div id="noResultAlert" class="alert alert-warning text-center" style="display: none;">
        Barang tidak ditemukan.
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kategori</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Suplier</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="barang-table-body">
            @foreach($barang as $item)
            <tr class="barang-item" data-nama_barang="{{ strtolower($item->nama_barang) }}" data-kategori="{{ strtolower($item->kategori) }}">
                <td>{{ $item->id }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->suplier->nama }}</td>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const searchInput = $('#searchInput'); // Input search
            const inventarisItems = $('.barang-item'); // Baris tabel barang
            const noResultAlert = $('#noResultAlert'); // Pesan tidak ada hasil
    
            searchInput.on('input', function() {
                const searchValue = $(this).val().toLowerCase(); // Ambil nilai input search
                let hasVisibleItem = false; // Flag untuk menandai apakah ada hasil
    
                // Loop melalui setiap baris tabel
                inventarisItems.each(function() {
                    const item = $(this);
                    const nama_barang = item.data('nama_barang'); // Ambil data nama_barang
                    const kategori = item.data('kategori'); // Ambil data kategori
    
                    // Cek apakah nama_barang atau kategori mengandung kata kunci pencarian
                    const matchesSearch = nama_barang.includes(searchValue) || kategori.includes(searchValue);
    
                    // Tampilkan atau sembunyikan baris tabel berdasarkan hasil pencarian
                    if (matchesSearch) {
                        item.fadeIn();
                        hasVisibleItem = true; // Set flag menjadi true
                    } else {
                        item.fadeOut();
                    }
                });
    
                // Tampilkan atau sembunyikan pesan "Tidak ada hasil"
                if (hasVisibleItem) {
                    noResultAlert.hide();
                } else {
                    noResultAlert.fadeIn();
                }
            });
        });
    </script>
@endsection