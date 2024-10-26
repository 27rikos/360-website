<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Respon;
use Exception;

class KriteriaController extends Controller
{
    public function index()
    {
        $data = Criteria::all();
        return view('admin.kriteria.index', compact('data'));
    }

    public function calculate()
    {
        try {
            // Get all the responses using the Respon model
            $responses = Respon::all();

            // Initialize an array to store the data to be saved
            $criteriaData = [];
            Criteria::truncate();
            // Loop through each response to calculate the averages
            foreach ($responses as $response) {
                // Calculate the average for each group of questions
                $avg1 = ($response->p1 + $response->p2 + $response->p3 + $response->p4 + $response->p5) / 5;
                $avg2 = ($response->p6 + $response->p7 + $response->p8 + $response->p9 + $response->p10) / 5;
                $avg3 = ($response->p11 + $response->p12 + $response->p13 + $response->p14 + $response->p15) / 5;
                $avg4 = ($response->p16 + $response->p17 + $response->p18 + $response->p19 + $response->p20) / 5;
                $avg5 = ($response->p21 + $response->p22 + $response->p23 + $response->p24 + $response->p25) / 5;

                // Prepare data to be inserted into the Criteria model
                $criteriaData[] = [
                    'responden' => $response->responden,
                    'kehandalan' => $avg1,
                    'tanggap' => $avg2,
                    'jaminan' => $avg3,
                    'empati' => $avg4,
                    'bukti' => $avg5,
                ];
            }

            // Insert all criteria data into the database at once
            Criteria::insert($criteriaData);

            return back()->with('success', 'Kriteria Berhasil Di Hitung');
        } catch (Exception $e) {
            return back()->with('error', 'Kriteria Gagal Di Hitung' . $e->getMessage());
        }

    }

}