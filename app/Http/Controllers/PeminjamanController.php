<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use App\Models\Buku;
use App\Models\Mahasiswa;
use App\Models\Peminjaman;
use DateTime;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeminjamanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeminjamanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeminjamanRequest  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeminjamanRequest $request, Peminjaman $peminjaman)
    {

        $tgl_kembali = new DateTime("now");
        $peminjaman->update(array('tgl_kembali' => $tgl_kembali));
        $mahasiswa = Mahasiswa::where('nim', '=', $peminjaman->nim_mahasiswa)->first();
        return view('auth.admin.mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
    public function peminjamanBuku(Buku $buku)
    {
        $mahasiswa = auth()->user();
        if ($buku->jumlah_buku <= 0) {
            session()->flash('error', 'Buku tidak tersedia');
            return view('mahasiswa.buku.show', compact('buku'));
        }
        $tgl_pinjam = new DateTime("now");

        $peminjaman_latest = Peminjaman::where('nim_mahasiswa', '=', $mahasiswa->nim)->latest()->first();
        if (!isset($peminjaman_latest->tgl_kembali) && isset($peminjaman_latest)) {
            session()->flash('error', 'Anda masih memiliki peminjaman, harap dikembalikan terlebih dahulu');
            return view('mahasiswa.buku.show', compact('buku'));
        } else {
            $sisa_buku = $buku->jumlah_buku - 1;
            $buku->update(array('jumlah_buku' => $sisa_buku));

            Peminjaman::create(array(
                'tgl_pinjam' => $tgl_pinjam,
                'id_buku' => $buku->id,
                'nim_mahasiswa' => $mahasiswa->nim
            ));
            session()->flash('success', 'Buku Berhasil Dipinjam');
            return view('mahasiswa.buku.show', compact('buku'));
        }
    }
}
