<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peminjaman>
 */
class PeminjamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nim = '1904111000';
        static $nimAfter2 = 10;
        return [
            'tgl_pinjam' => '2022-11-1',
            'id_buku' => $this->faker->numberBetween(1, 30),
            'nim_mahasiswa' => $nim . ($nimAfter2++),
        ];
    }
}
