<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Result;
use Exception;

class AnalisisController extends Controller
{
    public function index()
    {
        $data = Result::first();
        return view('admin.hasil.index', compact('data'));
    }

    public function analyze()
    {
        try {
            Result::truncate();
            $kehandalan = number_format(Criteria::avg('kehandalan'), 2);
            $tanggap = number_format(Criteria::avg('tanggap'), 2);
            $jaminan = number_format(Criteria::avg('jaminan'), 2);
            $empati = number_format(Criteria::avg('empati'), 2);
            $bukti = number_format(Criteria::avg('bukti'), 2);

            Result::create([
                'kehandalan' => $kehandalan,
                'tanggap' => $tanggap,
                'jaminan' => $jaminan,
                'empati' => $empati,
                'bukti' => $bukti,
            ]);
            return back()->with('success', 'Data Berhasil Di Analisis');
        } catch (Exception $e) {
            return back()->with('success', 'Data Gagal Di Analisis' . $e->getMessage());
        }

    }
}