<?php

namespace App\Imports;

use App\Models\Respon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RespondenImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Respon::create(
                [
                    'responden' => $row['responden'],
                    'usia' => $row['usia'],
                    'jenkel' => $row['jenkel'],
                    'p1' => $row['p1'],
                    'p2' => $row['p2'],
                    'p3' => $row['p3'],
                    'p4' => $row['p4'],
                    'p5' => $row['p5'],
                    'p6' => $row['p6'],
                    'p7' => $row['p7'],
                    'p8' => $row['p8'],
                    'p9' => $row['p9'],
                    'p10' => $row['p10'],
                    'p11' => $row['p11'],
                    'p12' => $row['p12'],
                    'p13' => $row['p13'],
                    'p14' => $row['p14'],
                    'p15' => $row['p15'],
                    'p16' => $row['p16'],
                    'p17' => $row['p17'],
                    'p18' => $row['p18'],
                    'p19' => $row['p19'],
                    'p20' => $row['p20'],
                    'p21' => $row['p21'],
                    'p22' => $row['p22'],
                    'p23' => $row['p23'],
                    'p24' => $row['p24'],
                    'p25' => $row['p25'],
                ]
            );
        }
    }
}