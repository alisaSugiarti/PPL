@extends('layouts.admin.app')

@section('title', 'Mahasiswa')

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
            <h1 class="h3 mb-2 text-gray-800">Mahasiswa</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Prodi</th>
                                    <th>Status</th>
                                    <th>Riwayat Peminjaman</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Prodi</th>
                                    <th>Status</th>
                                    <th>Riwayat Peminjaman</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($mahasiswas as $mahasiswa)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ $mahasiswa->nim }}</td>
                                    <td>{{ $mahasiswa->program_studi->nama_prod }}</td>
                                    @if ($mahasiswa->peminjamans->where('tgl_kembali', '=', null)->first() != null)
                                    <td>Sedang Meminjam</td>
                                    @else
                                    <td>Belum Meminjam</td>
                                    @endif
                                    <td class="text-center">
                                        <a href="{{ route('admin.mahasiswas.show', $mahasiswa->nim) }}">
                                            <i class="far fa-eye text-secondary"></i>
                                        </a>
                                    </td>
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
