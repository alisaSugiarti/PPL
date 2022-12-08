<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Agama;
use App\Models\Buku;
use App\Models\Mahasiswa;
use App\Models\Peminjaman;
use App\Models\Program_studi;
use DateTime;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = auth()->user();
        $bukus = Buku::paginate(12);
        $peminjamans = Peminjaman::where('nim_mahasiswa', '=', $mahasiswa->nim)->paginate(10);
        return view('mahasiswa.index', compact('mahasiswa', 'bukus', 'peminjamans'));
    }

    public function indexAdmin()
    {
        $mahasiswas = Mahasiswa::all();
        $peminjamans = Peminjaman::all();
        return view('auth.admin.mahasiswa.index', compact('mahasiswas', 'peminjamans'));
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
     * @param  \App\Http\Requests\StoreMahasiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMahasiswaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('auth.admin.mahasiswa.show', compact('mahasiswa',));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMahasiswaRequest  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }

    public function updatePassword()
    {
        request()->validate([
            'oldPassword' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $attr = request()->all();

        $mahasiswa_nim = auth()->user()->nim;
        $mahasiswa = Mahasiswa::find($mahasiswa_nim);

        if (Hash::check(request()->oldPassword, $mahasiswa->password)) {
            $attr['password'] = Hash::make(request()->password);
            $mahasiswa->update($attr);
            return redirect()->route('mahasiswa.profile')->with('success', 'Password telah diubah');
        } else {
            return redirect()->route('mahasiswa.profile')->with('error', 'Password lama salah');
        }

        return redirect()->route('mahasiswa.profile')->with('success', 'Password telah diubah');
    }
    public function editProfileMahasiswa(Mahasiswa $mahasiswa)
    {
        $program_studis = Program_studi::all();
        $agamas = Agama::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'program_studis', 'agamas'));
    }

    public function updateProfileMahasiswa(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $attr = $request->all();
        $attr['nim'] = $mahasiswa->nim;
        $attr['password'] = $mahasiswa->password;

        $mahasiswa->update($attr);

        return redirect()->route('mahasiswa.profile')->with('success', 'Profile telah diubah');
    }
}
