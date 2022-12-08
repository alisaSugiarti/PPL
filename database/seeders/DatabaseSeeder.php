<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            AgamaSeeder::class,
            FakultasSeeder::class,
            JurusanSeeder::class,
            Program_studiSeeder::class,
            MahasiswaSeeder::class,
            BukuSeeder::class,
            PeminjamanSeeder::class,
        ]);
    }
}
