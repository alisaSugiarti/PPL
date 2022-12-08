@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('header')

@endsection

@section('content')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        @include('layouts.admin.topbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>

            <!-- Content Row -->
            <div class="row justify-content-center">
                <!-- Mahasiswa Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Judul Buku
                                        yang Tersedia
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $judul_buku_tersedia }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <span class="material-icons">
                                        people
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Peminjam Buku Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Judul Buku
                                        Terbaru
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <i class="text-capitalize">{{ $judul_buku_terbaru }}</i>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <span class="material-icons">
                                        menu_book
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Peminjam Buku Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Jumlah
                                        Peminjam
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $jumlah_peminjam }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <span class="material-icons">
                                        people
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Content Row -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data-data Buku</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>Jumlah di Rak</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>Jumlah di Rak</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($bukus as $buku)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $buku->judul }}</td>
                                    <td>{{ $buku->pengarang }}</td>
                                    <td>{{ $buku->penerbit }}</td>
                                    <td>{{ $buku->tahun_terbit }}</td>
                                    <td>{{ $buku->jumlah_buku }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
