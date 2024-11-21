<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function print()
    {
        $data = Result::first();

        // Calculate 'hasil akhir' and percentages
        $kehandalan = $data->kehandalan ?? 0;
        $tanggap = $data->tanggap ?? 0;
        $jaminan = $data->jaminan ?? 0;
        $empati = $data->empati ?? 0;
        $bukti = $data->bukti ?? 0;

        // Calculate hasil akhir (average)
        $total = $kehandalan + $tanggap + $jaminan + $empati + $bukti;
        $hasilAkhir = $total / 5;

        // Calculate percentages for each category (assuming max score is 4)
        $percentages = [
            'kehandalan' => ($kehandalan / 4) * 100,
            'tanggap' => ($tanggap / 4) * 100,
            'jaminan' => ($jaminan / 4) * 100,
            'empati' => ($empati / 4) * 100,
            'bukti' => ($bukti / 4) * 100,
        ];

        // Pass data to the view
        $pdf = Pdf::loadView('admin.hasil.report', compact('data', 'hasilAkhir', 'percentages'));
        return $pdf->download('Report.pdf');
    }

}