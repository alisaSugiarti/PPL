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
            <!-- FLASH MESSAGE -->
            @if(session()->has('success'))
            <div class="alert alert-success mt-4">
                {{ session()->get('success') }}
            </div>
            @endif

            @if(session()->has('error'))
            <div class="alert alert-danger mt-4">
                {{ session()->get('error') }}
            </div>
            @endif

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Edit Buku</h1>
            <!-- DataTales Example -->
            <div class="container  w-50">
                <div class="card p-3">
                    <form action="{{ route('admin.bukus.update', $buku->slug) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <!-- judul -->
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                value="{{ old('judul')?? $buku->judul}}">
                        </div>
                        @error('judul')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- pengarang -->
                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" class="form-control" id="pengarang" name="pengarang"
                                value="{{ old('pengarang') ?? $buku->pengarang}}">
                        </div>
                        @error('pengarang')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- penerbit -->
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit"
                                value="{{ old('penerbit') ?? $buku->penerbit}}">
                        </div>
                        @error('penerbit')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- tahun_terbit -->
                        <div class="form-group">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit"
                                value="{{ old('tahun_terbit') ?? $buku->tahun_terbit}}">
                        </div>
                        @error('tahun_terbit')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- jumlah_buku -->
                        <div class="form-group">
                            <label for="jumlah_buku">Jumlah Buku</label>
                            <input type="number" class="form-control" id="jumlah_buku" name="jumlah_buku"
                                value="{{ old('jumlah_buku') ?? $buku->jumlah_buku}}">
                        </div>
                        @error('jumlah_buku')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <!-- gambar -->
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar"
                                value="{{ old('gambar') ?? $buku->gambar}}">
                            <img class="mt-3 mb-5" src="{{ asset('/storage/' . $buku->gambar) }}" alt="gambar"
                                style="width: 80%" />
                        </div>
                        @error('gambar')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <a class="btn btn-primary mt-2" type="button" href="{{ route('admin.bukus.index') }}">
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-success mt-2" name="submit">Submit</button>
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
