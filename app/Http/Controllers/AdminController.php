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
        $barang = Barang::with(['suplier'])->get();
        return view('admin.barang.index', compact('barang'));
    }



    public function create()
    {
        $suplier = Suplier::all();
        return view('admin.barang.create', compact('suplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 
                'required', 
                'string', 
                'min:3', 
                'max:50', 
                'regex:/^[a-zA-Z\s]+$/'
            ,
            'nama_barang' => 
                'required', 
                'string', 
                'min:3', 
                'max:100'
            ,
            'harga' => 
                'required', 
                'numeric', 
                'min:1'
            ,
            'stok' => 
                'required', 
                'integer', 
                'min:1'
            ,
            'suplier_id' => 
                'required', 
                'exists:suplier,id'
            ,
        ]);

        Barang::create($request->all());

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        $suplier = Suplier::all();
        return view('admin.barang.edit', compact('barang', 'suplier'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kategori' => 
                'required', 
                'string', 
                'min:3', 
                'max:50', 
                'regex:/^[a-zA-Z\s]+$/'
            ,
            'nama_barang' => 
                'required', 
                'string', 
                'min:3', 
                'max:100'
            ,
            'harga' => 
                'required', 
                'numeric', 
                'min:1'
            ,
            'stok' => 
                'required', 
                'integer', 
                'min:1'
            ,
            'suplier_id' => 
                'required', 
                'exists:suplier,id'
            ,
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
            'nama' => [
                'required', 
                'string', 
                'min:3', 
                'max:100'
            ],
            'alamat' => [
                'required', 
                'string', 
                'min:10', 
                'max:255'
            ],
            'kota' => [
                'required', 
                'string', 
                'min:3', 
                'max:100'
            ],
            'telepon' => [
                'required', 
                'regex:/^(\+62|0)[1-9][0-9]{7,10}$/'
            ],

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
            'nama' => [
                'required', 
                'string', 
                'min:3', 
                'max:100'
            ],
            'alamat' => [
                'required', 
                'string', 
                'min:10', 
                'max:255'
            ],
            'kota' => [
                'required', 
                'string', 
                'min:3', 
                'max:100'
            ],
            'telepon' => [
                'required', 
                'regex:/^(\+62|0)[1-9][0-9]{7,10}$/'
            ],

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
