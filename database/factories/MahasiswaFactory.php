<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nama = $this->faker->name;
        $nim = '1904111000';
        static $nimAfter = 10;
        return [
            'nim' => $nim . ($nimAfter++),
            'nama' => $nama,
            'password' => Hash::make('123123'),
            'alamat' => 'Jl. Ini Alamatnya Mahasiswa',
            'tanggal_lahir' => now()->format('Y-m-d'),
            'jenis_kelamin' => rand(0, 1),
            'no_hp' => '0823472784783',
            'kode_agama' => rand(1, 6),
            'kode_prodi' => rand(10, 21),
        ];
    }
}
