<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'nis' => '2021080001',
            'nisn' => '0089726459',
            'nama_siswa' => 'Angger Shalahuddin',
            'kelamin' => 'Laki-laki',
            'tempat_lahir' => 'Bogor',
            'tgl_lahir' => '2001-07-23',
            'nama_ayah' => 'Ayahku',
            'nama_ibu' => 'Ibuku',
            'alamat' => 'Bogor',
            'kelas' => 'XII-1',
            'periode' => '2024',
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
        Student::create([
            'nis' => '2021080002',
            'nisn' => '0089726460',
            'nama_siswa' => 'Jingga Kingkin Nur',
            'kelamin' => 'Perempuan',
            'tempat_lahir' => 'Jakarta',
            'tgl_lahir' => '2001-09-12',
            'nama_ayah' => 'Ayahku',
            'nama_ibu' => 'Ibuku',
            'alamat' => 'Jakarta',
            'kelas' => 'XII-1',
            'periode' => '2024',
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
    }
}
