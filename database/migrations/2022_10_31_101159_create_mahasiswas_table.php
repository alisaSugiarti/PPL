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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->char('nim', 12)->primary();
            $table->string('nama', 100);
            $table->string('password', 100);
            $table->text('alamat')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->boolean('jenis_kelamin')->nullable();
            $table->string('no_hp', 100)->nullable();
            $table->timestamps();
        });

        Schema::table('mahasiswas', function (Blueprint $table) {
            // FK Agama
            $table->boolean('kode_agama')->nullable();
            $table->foreign('kode_agama')->references('kode')->on('agamas');

            // FK Prodi
            $table->char('kode_prodi', 2)->nullable();
            $table->foreign('kode_prodi')->references('kode')->on('program_studis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
};
