@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('header')

@endsection

@section('content')

<!-- DAFTAR BUKU Section-->
<section class="page-section mt-5" id="daftar_buku">
    <div class="container">
        <!-- Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Detail Buku</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
        </div>
        <!-- FLASH MESSAGE -->
        @if(session()->has('success'))
        <div class="text-success  mt-4">
            <h6 class="page-section-heading text-center text-success mb-0" style="font-size: 20px">
                {{ session()->get('success') }}
            </h6>

        </div>
        @endif

        @if(session()->has('error'))
        <div class="text-danger mt-4">
            <h6 class="page-section-heading text-center text-danger mb-0" style="font-size: 20px"> {{
                session()->get('error') }}
            </h6>
        </div>
        @endif

        {{-- BAGIAN DAFTAR BUKU --}}
        <div class="row g-4 d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card mb-3 card-putih kecil">
                    <div class="row g-0 ">
                        <div class="card-body ms-2">
                            <form>
                                <!-- JUDUL -->
                                <div class="form-group mb-2">
                                    <label class="fw-bold" for="judul" class="fw-bold">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="{{ $buku->judul }}" readonly>
                                </div>
                                <!-- PENGARANG -->
                                <div class="form-group mb-2">
                                    <label class="fw-bold" for="pengarang">Pengarang</label>
                                    <input type="text" class="form-control" id="pengarang" name="pengarang"
                                        value="{{ $buku->pengarang }}" readonly>
                                </div>
                                <!-- PENERBIT -->
                                <div class="form-group mb-2">

                                    <label class="fw-bold" for="penerbit">Penerbit</label>
                                    <input type="text" class="form-control" id="penerbit" name="penerbit"
                                        value="{{ $buku->penerbit }}" readonly>
                                </div>
                                <!-- TAHUN TERBIT -->
                                <div class="form-group mb-2">
                                    <label class="fw-bold" for="tahun_terbit">Tahun Terbit</label>
                                    <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit"
                                        value="{{ $buku->tahun_terbit }}" readonly>
                                </div>
                                <!-- JUMLAH DI RAK -->
                                <div class="form-group mb-2">
                                    <label class="fw-bold" for="jumlah_buku">Jumlah di Rak</label>
                                    <input type="text" class="form-control" id="jumlah_buku" name="jumlah_buku"
                                        value="{{ $buku->jumlah_buku }}" readonly>
                                </div>
                                <!-- GAMBAR -->
                                <div class="form-group mb-2">
                                    <label class="fw-bold" for="gambar" class="mt-2">Gambar</label>
                                    <br>
                                    <img id="gambar" class="mb-5" style="width: 50%"
                                        src="{{asset('storage/' . $buku->gambar) }}" alt="gambar" />
                                </div>
                                <a class="btn btn-primary mt-2 " type="button" href="{{ route('mahasiswa.index') }}">
                                    Kembali
                                </a>
                            </form>
                            <form action="{{ route('mahasiswa.peminjamanBuku', $buku->slug) }}" method="post">
                                @csrf
                                <input class="btn btn-success mt-3 form-control" type="submit" value="Pinjam">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Copyright Section-->
<div class="copyright py-4 text-center text-white">
    <div class=" container"><small>Copyright &copy; Si Perpus UTM 2022</small></div>
</div>
@endsection
