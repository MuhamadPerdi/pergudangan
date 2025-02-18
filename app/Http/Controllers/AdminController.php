<?php

namespace App\Http\Controllers;

use App\Models\Gerai;
use App\Models\Barang;
use App\Models\Suplier;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function gudang(Request $request)
    {
        $barang = Barang::with(['suplier', 'gerai']);

        if ($request->has('search')) {
            $barang->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        $barang = $barang->get();

        return view('gudang.index', compact('barang'));
    }
    public function index()
    {
        $barang = Barang::with(['suplier', 'gerai'])->get();
        return view('admin.barang.index', compact('barang'));
    }

    public function create()
    {
        $suplier = Suplier::all();
        $gerai = Gerai::all();
        return view('admin.barang.create', compact('suplier', 'gerai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'suplier_id' => 'required|exists:suplier,id',
            'gerai_id' => 'required|exists:gerai,id',
        ]);

        Barang::create($request->all());

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        $suplier = Suplier::all();
        $gerai = Gerai::all();
        return view('admin.barang.edit', compact('barang', 'suplier', 'gerai'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kategori' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'suplier_id' => 'required|exists:suplier,id',
            'gerai_id' => 'required|exists:gerai,id',
        ]);

        $barang->update($request->all());

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil dihapus.');
    }

    // Suplier
    public function suplierIndex()
    {
        $suplier = Suplier::all();
        return view('admin.suplier.index', compact('suplier'));
    }

    public function suplierCreate()
    {
        return view('admin.suplier.create');
    }

    public function suplierStore(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'telepon' => 'required',
        ]);

        Suplier::create($request->all());

        return redirect()->route('admin.suplier.index')->with('success', 'Suplier berhasil ditambahkan.');
    }

    public function suplierEdit(Suplier $suplier)
    {
        return view('admin.suplier.edit', compact('suplier'));
    }

    public function suplierUpdate(Request $request, Suplier $suplier)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'telepon' => 'required',
        ]);

        $suplier->update($request->all());

        return redirect()->route('admin.suplier.index')->with('success', 'Suplier berhasil diperbarui.');
    }

    public function suplierDestroy(Suplier $suplier)
    {
        $suplier->delete();
        return redirect()->route('admin.suplier.index')->with('success', 'Suplier berhasil dihapus.');
    }
}
