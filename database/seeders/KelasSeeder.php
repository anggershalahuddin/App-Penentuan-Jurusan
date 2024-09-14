<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'kelas' => 'XII-A',
            'id_tahun' => '1'
        ]);
        Kelas::create([
            'kelas' => 'XII-B',
            'id_tahun' => '1'
        ]);
        Kelas::create([
            'kelas' => 'XII-C',
            'id_tahun' => '1'
        ]);
        Kelas::create([
            'kelas' => 'XII-D',
            'id_tahun' => '1'

        ]);
    }
}
