@extends('layouts.admin.app')

@section('title', 'Buku')

@section('header')

@endsection

@section('content')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        @include('layouts.admin.topbar')


        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Lihat Buku</h1>
            <!-- DataTales Example -->
            <div class="container  w-50">
                <div class="card p-3">
                    <form>
                        <!-- JUDUL -->
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku->judul }}"
                                readonly>
                        </div>
                        <!-- PENGARANG -->
                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" class="form-control" id="pengarang" name="pengarang"
                                value="{{ $buku->pengarang }}" readonly>
                        </div>
                        <!-- PENERBIT -->
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit"
                                value="{{ $buku->penerbit }}" readonly>
                        </div>
                        <!-- TAHUN TERBIT -->
                        <div class="form-group">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit"
                                value="{{ $buku->tahun_terbit }}" readonly>
                        </div>
                        <!-- JUMLAH DI RAK -->
                        <div class="form-group">
                            <label for="jumlah_buku">Jumlah di Rak</label>
                            <input type="text" class="form-control" id="jumlah_buku" name="jumlah_buku"
                                value="{{ $buku->jumlah_buku }}" readonly>
                        </div>
                        <!-- GAMBAR -->
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <img id="gambar" class="mt-3 mb-5" style="width: 80%"
                                src="{{ asset('storage/' . $buku->gambar) }}" alt="gambar" />
                        </div>
                        <a class="btn btn-primary mt-2 " type="button" href="{{ route('admin.bukus.index') }}">
                            Kembali
                        </a>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Siperpus UTM 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
@endsection

@section('script')

@endsection
