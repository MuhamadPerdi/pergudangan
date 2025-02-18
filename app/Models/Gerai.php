<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerai extends Model
{
    use HasFactory;

    protected $table = 'gerai';

    protected $fillable = ['nama', 'alamat', 'kota', 'telepon'];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
