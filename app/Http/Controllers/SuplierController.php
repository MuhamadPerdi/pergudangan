<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    // Suplier
    public function index()
    {
        $suplier = Suplier::all();
        return view('admin.suplier.index', compact('suplier'));
    }

    public function create()
    {
        return view('admin.suplier.create');
    }

    public function store(Request $request)
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

    public function edit(Suplier $suplier)
    {
        return view('admin.suplier.edit', compact('suplier'));
    }

    public function update(Request $request, Suplier $suplier)
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

    public function destroy(Suplier $suplier)
    {
        $suplier->delete();
        return redirect()->route('admin.suplier.index')->with('success', 'Suplier berhasil dihapus.');
    }
}
