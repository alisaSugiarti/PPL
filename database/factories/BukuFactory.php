<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->words(3, true),
            'slug' => \Str::slug($this->faker->sentence()),
            'pengarang' => 'Ini Pengarang',
            'penerbit' => 'Ini Penerbit',
            'tahun_terbit' => $this->faker->date('Y'),
            'jumlah_buku' => $this->faker->randomNumber(2),
            'gambar' => $this->faker->imageUrl(360, 360, 'animals', true, 'cats'),
        ];
    }
}
