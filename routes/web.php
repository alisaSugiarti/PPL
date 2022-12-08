<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth Route (Login and Register)
Auth::routes();
Route::get('/', [LoginController::class, 'viewMahasiswaLogin']);
Route::get('/login', [LoginController::class, 'viewMahasiswaLogin'])->name('viewMahasiswaLogin');
Route::post('/login', [LoginController::class, 'mahasiswaLogin'])->name('mahasiswaLogin');
Route::get('/admin/login', [LoginController::class, 'viewAdminLogin'])->name('viewAdminLogin');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('adminLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Disable Default Auth from Laravel UI Auth
Route::get('/register', [LoginController::class, 'disableDefaultAuth']);
// Register mahasiswa
Route::get('/mahasiswa/register', [RegisterController::class, 'viewMahasiswaRegister'])->name('viewMahasiswaRegister');
Route::post('/mahasiswa/register', [RegisterController::class, 'mahasiswaRegister'])->name('mahasiswaRegister');



// HALAMAN Siperpus UTM ADMIN
Route::group(
    ['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'],
    function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // Admin - Mahasiswa
        Route::group(
            ['prefix' => 'mahasiswas', 'as' => 'mahasiswas.'],
            function () {
                Route::get('/', [MahasiswaController::class, 'indexAdmin'])->name('index');
                Route::get('/create', [MahasiswaController::class, 'create'])->name('create');
                Route::post('/store', [MahasiswaController::class, 'store'])->name('store');
                Route::get('/edit/{mahasiswa:nim}', [MahasiswaController::class, 'edit'])->name('edit');
                Route::patch('/update/{mahasiswa:nim}', [MahasiswaController::class, 'update'])->name('update');
                // Destroy ubah ke delete di formnya juga
                Route::get('/destroy/{mahasiswa:nim}', [MahasiswaController::class, 'destroy'])->name('destroy');
                Route::get('/{mahasiswa:nim}', [MahasiswaController::class, 'show'])->name('show');
                Route::patch('/updatePassword', [MahasiswaController::class, 'updatePassword'])->name('updatePassword');
            }
        );
        // Admin - Buku
        Route::group(
            ['prefix' => 'bukus', 'as' => 'bukus.'],
            function () {
                Route::get('/', [BukuController::class, 'indexAdmin'])->name('index');
                Route::get('/create', [BukuController::class, 'create'])->name('create');
                Route::post('/store', [BukuController::class, 'store'])->name('store');
                Route::get('/edit/{buku:slug}', [BukuController::class, 'edit'])->name('edit');
                Route::patch('/update/{buku:slug}', [BukuController::class, 'update'])->name('update');
                Route::get('/destroy/{buku:slug}', [BukuController::class, 'destroy'])->name('destroy');
                Route::get('/{buku:slug}', [BukuController::class, 'show'])->name('show');
            }
        );

        // Admin - Buku
        Route::group(
            ['prefix' => 'peminjamans', 'as' => 'peminjamans.'],
            function () {
                Route::get('/update/{peminjaman:id}', [PeminjamanController::class, 'update'])->name('update');
            }
        );


        // Admin - Jurusan
        Route::group(
            ['prefix' => 'jurusans', 'as' => 'jurusans.'],
            function () {
                Route::get('/', [JurusanController::class, 'indexAdmin'])->name('index');
                Route::get('/create', [JurusanController::class, 'create'])->name('create');
                Route::post('/store', [JurusanController::class, 'store'])->name('store');
                Route::get('/edit/{jurusan:kode}', [JurusanController::class, 'edit'])->name('edit');
                Route::patch('/update/{jurusan:kode}', [JurusanController::class, 'update'])->name('update');
                Route::get('/destroy/{jurusan:kode}', [JurusanController::class, 'destroy'])->name('destroy');
            }
        );
    }
);


// HALAMAN MAHASISWA
Route::group(
    ['middleware' => 'auth:mahasiswa', 'prefix' => 'mahasiswa', 'as' => 'mahasiswa.'],
    function () {
        Route::get('/', [MahasiswaController::class, 'index'])->name('index');
        Route::get('/updateProfile/{mahasiswa:nim}', [MahasiswaController::class, 'editProfileMahasiswa'])->name('editProfileMahasiswa');
        Route::patch('/updateProfile/{mahasiswa:nim}', [MahasiswaController::class, 'updateProfileMahasiswa'])->name('updateProfileMahasiswa');
        Route::get('#profile', [MahasiswaController::class, 'index'])->name('profile');
        Route::patch('/updatePassword', [MahasiswaController::class, 'updatePassword'])->name('updatePassword');
        Route::get('/bukus/{buku:slug}', [BukuController::class, 'showForMahasiswa'])->name('showForMahasiswa');
        Route::post('/bukus/pinjam/{buku:slug}', [PeminjamanController::class, 'peminjamanBuku'])->name('peminjamanBuku');
    }
);
