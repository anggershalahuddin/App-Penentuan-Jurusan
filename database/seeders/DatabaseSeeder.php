<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            // PeriodSeeder::class,
            // KelasSeeder::class,
            // StudentsSeeder::class,
            // NilaiSeeder::class,
            // CentroidsSeeder::class,
            // Tambahkan seeder lainnya di sini.
        ]);
    }
}