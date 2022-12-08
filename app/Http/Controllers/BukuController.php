<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    public function indexAdmin()
    {
        $bukus = Buku::all();
        return view('auth.admin.buku.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.admin.buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBukuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBukuRequest $request)
    {
        // bukuS
        $attr = $request->all();
        $slug = Str::slug($request->judul);
        $attr['slug'] = $slug;

        // Menyimpan File gambar buku
        $gambar = request()->file('gambar');
        $gambarUrl = $gambar->storeAs("images/bukus", "{$slug}.{$gambar->extension()}");
        $attr['gambar'] = $gambarUrl;

        Buku::create($attr);

        session()->flash('success', 'Buku telah ditambahkan');
        return redirect(route('admin.bukus.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        return view('auth.admin.buku.show', compact('buku'));
    }

    public function showForMahasiswa(Buku $buku)
    {
        return view('mahasiswa.buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('auth.admin.buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBukuRequest  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBukuRequest $request, Buku $buku)
    {
        $attr = $request->all();

        // Update Slug
        $slug = Str::slug($request->judul);
        $attr['slug'] = $slug;

        // Update jika request gambar kosong
        $gambar = request()->file('gambar');
        if (isset($gambar)) {
            $gambarUrl = $gambar->storeAs("images/bukus", "{$slug}.{$gambar->extension()}");
            if ($slug != $buku->slug) {
                Storage::delete($buku->gambar);
            }
        } else {
            $gambarUrl = $buku->gambar;
        }
        $attr['gambar'] = $gambarUrl;

        $buku->update($attr);

        session()->flash('success', 'buku berhasil diedit');
        return redirect(route('admin.bukus.edit', $buku->slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
