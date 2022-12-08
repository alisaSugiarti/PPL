<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali')->nullable();
            $table->timestamps();
        });
        // FK
        Schema::table('peminjamen', function (Blueprint $table) {
            // Kalau mau buat fk diperhatika untuk tabel refresnsi dan tabel utama struktur harus sama yaitu jika char maka harus char
            $table->unsignedBigInteger('id_buku');
            $table->foreign('id_buku')->references('id')->on('bukus');

            $table->char('nim_mahasiswa', 12);
            $table->foreign('nim_mahasiswa')->references('nim')->on('mahasiswas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamen');
    }
};
