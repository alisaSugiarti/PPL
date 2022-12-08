<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Models\Buku;
use App\Models\Dashboard;
use App\Models\Mahasiswa;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas =  Mahasiswa::all();
        $bukus = Buku::all();
        $peminjamans = Peminjaman::all();

        $judul_buku_tersedia = Buku::where('jumlah_buku', '>', 0)->count();

        $judul_buku_terbaru = Buku::where('jumlah_buku', '>', 0)->orderby('created_at', 'desc')->first()->judul;

        // status 0: Dipinjam, 1: Dikembalikan, 2: Denda
        $jumlah_peminjam = $peminjamans->where('status', '=', 0)->count();

        return view('auth.admin.dashboard.index', compact('bukus', 'judul_buku_tersedia', 'judul_buku_terbaru', 'jumlah_peminjam'));
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
     * @param  \App\Http\Requests\StoreDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDashboardRequest  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDashboardRequest $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
