<?php

namespace App\Imports;

use App\Models\Kuisioner;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KuisionerImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Kuisioner::create([
                'pertanyaan' => $row['pertanyaan'],
                'kriteria' => $row['kriteria'],
                'p1' => $row['p1'],
                'p2' => $row['p2'],
                'p3' => $row['p3'],
                'p4' => $row['p4'],
            ]);
        }
    }
}