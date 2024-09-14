<?php

namespace App\Exports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResultsExport implements FromArray, WithHeadings
{
    public function array(): array
    {
        // Ambil semua data dari tabel `results`
        $results = Result::with(['student', 'centroid'])->get()->map(function ($result) {
            return [
                'NIS' => $result->student->nis ?? 'N/A',
                'NISN' => $result->student->nisn ?? 'N/A',
                'Nama Siswa' => $result->student->nama_siswa ?? 'N/A',
                'Jenis Kelamin' => $result->student->kelamin ?? 'N/A',
                'Kode Centroid/Cluster' => $result->centroid->kode_centroid ?? 'N/A',
                'Nama Cluster' => $result->centroid->nama_cluster ?? 'N/A',
                'Rumpun' => $result->centroid->rumpun ?? 'N/A',
            ];
        })->toArray();

        return $results;
    }

    public function headings(): array
    {
        return [
            'NIS',
            'NISN',
            'Nama Siswa',
            'Jenis Kelamin',
            'Kode Centroid/Cluster',
            'Nama Cluster',
            'Rumpun',
        ];
    }
}
