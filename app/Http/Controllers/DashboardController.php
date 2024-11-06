<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Respon;
use App\Models\Result;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Result::first();
        $respon = Respon::count();
        $kriteria = Criteria::count();
        return view('admin.dashboard.index', compact('respon', 'kriteria', 'data'));
    }
}