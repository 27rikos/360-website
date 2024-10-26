<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Respon;

class DashboardController extends Controller
{
    public function index()
    {
        $respon = Respon::count();
        $kriteria = Criteria::count();
        return view('admin.dashboard.index', compact('respon', 'kriteria'));
    }
}