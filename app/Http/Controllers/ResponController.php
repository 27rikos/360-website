<?php

namespace App\Http\Controllers;

use App\Imports\RespondenImport;
use App\Models\Respon;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ResponController extends Controller
{
    public function index()
    {
        $data = Respon::all();
        return view('admin.responden.index', compact('data'));
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new RespondenImport, $request->file);
            return back()->with('success', 'Data Di Import');
        } catch (Exception $e) {
            return back()->with('error', 'Data Gagal Di Import');
        }

    }

    public function destroy()
    {
        try {
            Respon::truncate();
            return redirect()->route('respon.index')->with('success', 'Data Dihapus');
        } catch (Exception $e) {
            return redirect()->route('respon.index')->with('error', 'Data Gagal Dihapus' . $e->getMessage());
        }

    }
}