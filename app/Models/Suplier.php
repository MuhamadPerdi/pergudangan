<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    use HasFactory;

    protected $table = 'suplier';

    protected $fillable = ['id_suplier','nama', 'alamat', 'kota', 'telepon'];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
