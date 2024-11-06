@extends('template.main')
@section('title', 'Responden')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Kuisioner
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Kelola Kuisioner</li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Kuisioner</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl d-flex flex-column justify-content-center">
            <div class="card">
                <div class="card-header justify-content-end">
                    <a href="{{ route('kuisioner.index') }}" class="btn btn-primary"><i
                            class="ti ti-arrow-left fs-2 me-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('kuisioner.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="pertanyaan">Pertanyaan</label>
                            <input type="text" name="pertanyaan" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="kriteria">Kriteria</label>
                            <select name="kriteria" id="" class="form-select">
                                <option value="">Pilih Kriteria</option>
                                <option value="Kehandalan">Kehandalan</option>
                                <option value="Daya Tanggap">Daya Tanggap</option>
                                <option value="Jaminan">Jaminan</option>
                                <option value="Empati">Empati</option>
                                <option value="Bukti Fisik">Bukti Fisik</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="p1">P1</label>
                                    <input type="text" name="p1" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="p2">P2</label>
                                    <input type="text" name="p2" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="p3">P3</label>
                                    <input type="text" name="p3" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="p4">P4</label>
                                    <input type="text" name="p4" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary my-3" type="submit">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
