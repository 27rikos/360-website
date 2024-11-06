<?php

namespace App\Http\Controllers;

use App\Models\Kuisioner;
use App\Models\Respon;
use Exception;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $kehandalan = Kuisioner::where('kriteria', 'Kehandalan')->get();
        $dayatanggap = Kuisioner::where('kriteria', 'Daya Tanggap')->get();
        $jaminan = Kuisioner::where('kriteria', 'Jaminan')->get();
        $empati = Kuisioner::where('kriteria', 'Empati')->get();
        $fisik = Kuisioner::where('kriteria', 'Bukti Fisik')->get();
        return view('quiz.index', compact('kehandalan', 'dayatanggap', 'jaminan', 'empati', 'fisik'));
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'responden' => 'required',
                'jenkel' => 'required',
                'usia' => 'required',
                'p1' => 'required',
                'p2' => 'required',
                'p3' => 'required',
                'p4' => 'required',
                'p5' => 'required',
                'p6' => 'required',
                'p7' => 'required',
                'p8' => 'required',
                'p9' => 'required',
                'p10' => 'required',
                'p11' => 'required',
                'p12' => 'required',
                'p13' => 'required',
                'p14' => 'required',
                'p15' => 'required',
                'p16' => 'required',
                'p17' => 'required',
                'p18' => 'required',
                'p19' => 'required',
                'p20' => 'required',
                'p21' => 'required',
                'p22' => 'required',
                'p23' => 'required',
                'p24' => 'required',
                'p25' => 'required',
            ]);
            $data = Respon::create($request->all());
            $data->save();
            return redirect()->route('dashboard')->with('success', 'Terima Kasih Telah Mengisi Kuisioner Kami');
        } catch (Exception $e) {
            return redirect()->route('quiz.index')->with('error', 'Mohon Maaf Jawaban Anda Belum Tersimpan' . $e->getMessage());
        }
    }
}