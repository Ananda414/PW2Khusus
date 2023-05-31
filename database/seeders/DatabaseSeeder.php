<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach(range(1, 50) as $number) {
            Mahasiswa::create([
                'npm' => '2125250017'. $number,
                'nama' => fake()->name(),
                'tanngal_lahir' => fake()->date($format = 'Y-m-d', $max = 'now'),
                'kota_lahir' => fake()->state(),
                'foto' => '2125250017.png',
                'prodi_id' => '993bf8c7-9876-46c0-98b7-c856e30bbfc9'
            ]);
        }
        $this->call([
            FakultasSeeder::class
        ]);
    }
}
