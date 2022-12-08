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
            <h1 class="h3 mb-2 text-gray-800">Buku</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-primary" type="button" href="{{ route('admin.bukus.create') }}">
                        Tambah Buku
                    </a>
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
                                    <th>Action</th>
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
                                    <th>Action</th>
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
                                    <td class="text-center">
                                        <a href="{{ route('admin.bukus.show', $buku->slug) }}">
                                            <i class="far fa-eye text-primary"></i>
                                        </a>
                                        <a href="{{ route('admin.bukus.edit', $buku->slug) }}" class="ml-3">
                                            <i class="fas fa-edit text-success"></i>
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
