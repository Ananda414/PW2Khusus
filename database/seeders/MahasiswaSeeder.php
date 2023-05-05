<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('mahasiswa')->insert([
            [
                'id' => Str::uuid(),
            'npm' => '2125250017',
            'nama' => 'Ananda Wijaya',
            'tanggal_lahir' => '02/01/2000',
            'kota_lahir' => 'Palembang',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
    }
}
