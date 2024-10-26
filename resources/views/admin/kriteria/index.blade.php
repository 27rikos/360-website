@extends('template.main')
@section('title', 'Kriteria')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Kriteria
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Hasil Kriteria</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl d-flex flex-column justify-content-center">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header gap-2">
                    <a href="{{ route('kriteria.calc') }}" class="btn btn-info"><i
                            class="ti ti-calculator fs-2 me-2"></i>Hitung</a>
                </div>
                <div class="card-body">
                    <div class="responsive">
                        <table class="table table-bordered table-hover" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Responden</th>
                                    <th>Kehandalan</th>
                                    <th>Daya Tanggap</th>
                                    <th>Jaminan</th>
                                    <th>Empati</th>
                                    <th>Bukti Fisik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->responden }}</td>
                                        <td>{{ $item->kehandalan }}</td>
                                        <td>{{ $item->tanggap }}</td>
                                        <td>{{ $item->jaminan }}</td>
                                        <td>{{ $item->empati }}</td>
                                        <td>{{ $item->bukti }}</td>
                                    </tr>
                                @empty
                                    <div class="alert alert-info d-flex align-items-center" role="alert">
                                        <i class="ti ti-alert-triangle me-3"></i>
                                        <div>
                                            Data Kriteria Kosong
                                        </div>
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
