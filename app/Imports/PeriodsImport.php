<?php

namespace App\Imports;

use App\Models\Period;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PeriodsImport implements ToModel, WithHeadingRow
{
    public $duplicateEntries = [];

    public function model(array $row)
    {
        try {
            return new Period([
                'tahun' => $row['tahun'],
                'keterangan' => $row['keterangan'],
            ]);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                // Menyimpan data duplikat
                $this->duplicateEntries[] = $row[0]; // Menyimpan tahun sebagai identifier
            }
            // Lempar kembali exception agar tidak menghentikan proses import seluruhnya
            throw $e;
        }
    }
}
