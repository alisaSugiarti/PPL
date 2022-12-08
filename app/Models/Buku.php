<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'slug', 'pengarang', 'penerbit', 'jumlah_buku', 'tahun_terbit', 'gambar'];

    function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'id');
    }
}
