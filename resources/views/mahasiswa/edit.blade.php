@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('header')

@endsection

@section('content')

<!-- DAFTAR mahasiswa Section-->
<section class="page-section mt-5" id="daftar_mahasiswa">
    <div class="container">
        <!-- Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Detail mahasiswa</h2>
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

        {{-- BAGIAN DAFTAR mahasiswa --}}
        <div class="row g-4 d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card mb-3 card-putih kecil">
                    <div class="row g-0 ">
                        <div class="card-body ms-2">
                            <form action="{{ route('mahasiswa.updateProfileMahasiswa',$mahasiswa->nim) }}"
                                method="post">
                                @csrf
                                @method('patch')
                                <!-- NAMA -->
                                <div class="form-group">
                                    <label class="fw-bold mt-3" for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ old('nama')?? $mahasiswa->nama}}">
                                </div>
                                @error('nama')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <!-- NIM -->
                                <div class="form-group">
                                    <label class="fw-bold mt-3" for="nim">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim" maxlength="12"
                                        value="{{ old('nim') ?? $mahasiswa->nim}}" readonly>
                                </div>
                                @error('nim')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <!-- PRODI -->
                                <div class="form-group">
                                    <label class="fw-bold mt-3" for="kode_prodi">Prodi</label>
                                    <select class="form-control" name="kode_prodi" id="kode_prodi">
                                        <option value="{{ $mahasiswa->program_studi->kode }}">
                                            {{ $mahasiswa->program_studi->nama_prod }}
                                        </option>
                                        @foreach ($program_studis as $program_studi)
                                        <option value="{{ $program_studi->kode }}">
                                            {{ $program_studi->nama_prod }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('kode_prodi')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <!-- JENIS KELAMIN -->
                                <div class="form-group">
                                    <label class="fw-bold mt-3" for="jenis_kelamin">Jenis Kelamin</label>
                                    <option value="{{ $mahasiswa->jenis_kelamin }}">{{ $mahasiswa->jenis_kelamin == 0 ?
                                        "Laki-laki": "Perempuan" }}</option>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="0">Laki-laki</option>
                                        <option value="1">Perempuan</option>
                                    </select>
                                </div>
                                @error('jenis_kelamin')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <!-- AGAMA -->
                                <div class="form-group">
                                    <label class="fw-bold mt-3" for="kode_agama">Agama</label>
                                    <select class="form-control" name="kode_agama" id="kode_agama">
                                        <option value="{{ $mahasiswa->agama->kode }}">
                                            {{ $mahasiswa->agama->nama }}
                                        </option>
                                        @foreach ($agamas as $agama)
                                        <option value="{{ $agama->kode }}">
                                            {{ $agama->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('kode_agama')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <!-- TANGGAL LAHIR -->
                                <div class="form-group">
                                    <label class="fw-bold mt-3" for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir') ?? $mahasiswa->tanggal_lahir}}">
                                </div>
                                @error('tanggal_lahir')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <!-- ALAMAT -->
                                <div class="form-group">
                                    <label class="fw-bold mt-3" for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" rows="3"
                                        name="alamat">{{ old('alamat') ?? $mahasiswa->alamat}}</textarea>
                                </div>
                                @error('alamat')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <a class="btn btn-primary mt-2" type="button" href="{{ route('mahasiswa.index') }}">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-success mt-2" name="submit">Submit</button>
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
