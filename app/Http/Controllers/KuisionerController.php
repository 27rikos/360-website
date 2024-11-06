<?php

namespace App\Http\Controllers;

use App\Imports\KuisionerImport;
use App\Models\Kuisioner;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KuisionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kuisioner::all();
        return view('admin.kuisioner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kuisioner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'pertanyaan' => 'required',
                'kriteria' => 'required',
                'p1' => 'required',
                'p2' => 'required',
                'p3' => 'required',
                'p4' => 'required',
            ]);
            $data = Kuisioner::create($request->all());
            $data->save();
            return redirect()->route('kuisioner.index')->with('success', 'Kuisioner Ditambahkan');
        } catch (Exception $e) {
            return redirect()->route('kuisioner.index')->with('error', 'Kuisioner Gagal Ditambahkan' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function show(Kuisioner $kuisioner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kuisioner::findOrFail($id);
        return view('admin.kuisioner.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = Kuisioner::findOrFail($id);
            $data->update($request->all());
            $data->save();
            return redirect()->route('kuisioner.index')->with('success', 'Kuisioner  Diedit');
        } catch (Exception $e) {
            return redirect()->route('kuisioner.index')->with('success', 'Kuisioner Gagal Diedit' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kuisioner  $kuisioner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data = Kuisioner::findOrFail($id);
            $data->delete();
            return redirect()->route('kuisioner.index')->with('success', 'Kuisioner  Dihapus');
        } catch (Exception $e) {
            return redirect()->route('kuisioner.index')->with('success', 'Kuisioner  Gagal Dihapus' . $e->getMessage());
        }
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new KuisionerImport, $request->file);
            return back()->with('success', 'Berhasil Import Kuisioner');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal Import Kuisioner' . $e->getMessage());
        }
    }
}