<?php

namespace Database\Seeders;

use App\Models\Centroid;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CentroidsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Centroid::create([
            'kode_centroid' => 'C1',
            'nama_cluster' => 'Kedokteran',
            'rumpun' => 'SAINTEK',
            // 'students_id' => '1',
        ]);
        Centroid::create([
            'kode_centroid' => 'C2',
            'nama_cluster' => 'Hukum',
            'rumpun' => 'SOSHUM',
            // 'students_id' => '2',
        ]);
    }
}
