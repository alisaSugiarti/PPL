<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['tgl_pinjam', 'tgl_kembali', 'id_buku', 'nim_mahasiswa'];

    function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
