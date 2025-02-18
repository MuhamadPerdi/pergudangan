<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = ['id_barang','kategori', 'nama_barang', 'harga', 'stok', 'suplier_id'];

    public function suplier()
    {
        return $this->belongsTo(Suplier::class);
    }

}
