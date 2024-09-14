<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Student::all([
            'nis',
            'nisn',
            'nama_siswa',
            'kelamin',
            'tempat_lahir',
            'tgl_lahir',
            'nama_ayah',
            'nama_ibu',
            'alamat',
            'kelas',
            'periode',
            'n1',
            'n2',
            'n3',
            'n4',
            'n5',
            'n6',
            'n7',
            'n8',
            'n9',
            'n10',
            'n11',
            'n12',
            'n13',
            'n14',
            'n15'
        ]);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'nis',
            'nisn',
            'nama_siswa',
            'kelamin',
            'tempat_lahir',
            'tgl_lahir',
            'nama_ayah',
            'nama_ibu',
            'alamat',
            'kelas',
            'periode',
            'n1',
            'n2',
            'n3',
            'n4',
            'n5',
            'n6',
            'n7',
            'n8',
            'n9',
            'n10',
            'n11',
            'n12',
            'n13',
            'n14',
            'n15'
        ];
    }
}