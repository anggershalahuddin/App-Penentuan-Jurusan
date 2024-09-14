<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Period::create([
            'tahun' => '2020',
            'keterangan' => 'Madani 15'
        ]);
        Period::create([
            'tahun' => '2021',
            'keterangan' => 'Madani 16'
        ]);
        Period::create([
            'tahun' => '2022',
            'keterangan' => 'Madani 17'
        ]);
        Period::create([
            'tahun' => '2023',
            'keterangan' => 'Madani 18'
        ]);
        Period::create([
            'tahun' => '2024',
            'keterangan' => 'Madani 19'
        ]);
    }
}