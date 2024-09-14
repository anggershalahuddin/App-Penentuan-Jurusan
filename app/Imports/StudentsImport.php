<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    public $duplicateEntries = [];

    public function model(array $row)
    {
        // Cek duplikasi NIS dan NISN
        $existingStudent = Student::where('nis', $row['nis'])
            ->orWhere('nisn', $row['nisn'])
            ->first();

        if ($existingStudent) {
            // Jika ada data yang duplikat, simpan di array duplicateEntries
            $this->duplicateEntries[] = [
                'nis' => $row['nis'],
                'nisn' => $row['nisn'],
                'nama_siswa' => $row['nama_siswa']
            ];
            return null; // Jangan simpan data ini ke database
        }

        // Simpan data jika tidak ada duplikasi
        return new Student([
            'nis' => $row['nis'],
            'nisn' => $row['nisn'],
            'nama_siswa' => $row['nama_siswa'],
            'kelamin' => $row['kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tgl_lahir' => $row['tgl_lahir'],
            'nama_ayah' => $row['nama_ayah'],
            'nama_ibu' => $row['nama_ibu'],
            'alamat' => $row['alamat'],
            'kelas' => $row['kelas'],
            'periode' => $row['periode'],
            'n1' => $row['n1'],
            'n2' => $row['n2'],
            'n3' => $row['n3'],
            'n4' => $row['n4'],
            'n5' => $row['n5'],
            'n6' => $row['n6'],
            'n7' => $row['n7'],
            'n8' => $row['n8'],
            'n9' => $row['n9'],
            'n10' => $row['n10'],
            'n11' => $row['n11'],
            'n12' => $row['n12'],
            'n13' => $row['n13'],
            'n14' => $row['n14'],
            'n15' => $row['n15'],
        ]);
    }
}
