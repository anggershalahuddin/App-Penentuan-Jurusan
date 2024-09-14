<?php

namespace Database\Seeders;

use App\Models\Nilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nilai::create([
            'nis' => '2021080001',
            'n1' => '90',
            'n2' => '95',
            'n3' => '95',
            'n4' => '95',
            'n5' => '95',
            'n6' => '95',
            'n7' => '95',
            'n8' => '95',
            'n9' => '95',
            'n10' => '95',
            'n11' => '95',
            'n12' => '95',
            'n13' => '95',
            'n14' => '95',
            'n15' => '95',
        ]);
        Nilai::create([
            'nis' => '2021080002',
            'n1' => '90',
            'n2' => '93',
            'n3' => '93',
            'n4' => '93',
            'n5' => '93',
            'n6' => '93',
            'n7' => '93',
            'n8' => '93',
            'n9' => '93',
            'n10' => '95',
            'n11' => '95',
            'n12' => '95',
            'n13' => '95',
            'n14' => '95',
            'n15' => '95',
        ]);
    }
}
