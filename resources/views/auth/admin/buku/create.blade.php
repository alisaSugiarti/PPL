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
            <h1 class="h3 mb-2 text-gray-800">Tambah Buku</h1>
            <!-- DataTales Example -->
            <div class="container  w-50">
                <div class="card p-3">
                    <form action="{{ route('admin.bukus.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <!-- JUDUL -->
                        <div class=" form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul')}}">
                        </div>
                        @error('judul')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                        <!-- PENGARANG -->
                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" class="form-control" id="pengarang" name="pengarang"
                                value="{{ old('pengarang')}}">
                        </div>
                        @error('pengarang')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                        <!-- PENERBIT -->
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit"
                                value="{{ old('penerbit')}}">
                        </div>
                        @error('penerbit')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                        <!-- TAHUN TERBIT -->
                        <div class="form-group">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit"
                                value="{{ old('tahun_terbit')}}" maxlength="4">
                        </div>
                        @error('tahun_terbit')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                        <!-- JUMLAH BUKU -->
                        <div class="form-group">
                            <label for="jumlah_buku">Jumlah Buku</label>
                            <input type="number" class="form-control" id="jumlah_buku" name="jumlah_buku"
                                value="{{ old('jumlah_buku')}}">
                        </div>
                        @error('jumlah_buku')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror

                        <!-- GAMBAR -->
                        <div class="form-group">
                            <label for="gambar">Jumlah Buku</label>
                            <input type="file" class="form-control" id="gambar" name="gambar"
                                value="{{ old('gambar')}}">
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
