@extends('template.main')
@section('title', 'Responden')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Responden
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Hasil Responden</li>
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
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="ti ti-transfer-in fs-2 me-2"></i>Import
                    </button>
                    <a href="{{ route('drop') }}" class="btn btn-danger"><i
                            class="ti ti-bucket-droplet fs-2 me-2"></i>Hapus</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-2" id="exampleModalLabel">Import Responden</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <input type="file" class="form-control" name="file" accept=".xls,.xlsx,.csv">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="responsive">
                        <table class="table table-bordered table-hover" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Responden</th>
                                    <th>Usia</th>
                                    <th>Jenis Kelamin</th>
                                    <th>P1</th>
                                    <th>P2</th>
                                    <th>P3</th>
                                    <th>P4</th>
                                    <th>P5</th>
                                    <th>P6</th>
                                    <th>P7</th>
                                    <th>P8</th>
                                    <th>P9</th>
                                    <th>P10</th>
                                    <th>P11</th>
                                    <th>P12</th>
                                    <th>P13</th>
                                    <th>P14</th>
                                    <th>P15</th>
                                    <th>P16</th>
                                    <th>P17</th>
                                    <th>P18</th>
                                    <th>P19</th>
                                    <th>P20</th>
                                    <th>P21</th>
                                    <th>P22</th>
                                    <th>P23</th>
                                    <th>P24</th>
                                    <th>P25</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->responden }}</td>
                                        <td>{{ $item->usia }}</td>
                                        <td>{{ $item->jenkel }}</td>
                                        <td>{{ $item->p1 }}</td>
                                        <td>{{ $item->p2 }}</td>
                                        <td>{{ $item->p3 }}</td>
                                        <td>{{ $item->p4 }}</td>
                                        <td>{{ $item->p5 }}</td>
                                        <td>{{ $item->p6 }}</td>
                                        <td>{{ $item->p7 }}</td>
                                        <td>{{ $item->p8 }}</td>
                                        <td>{{ $item->p9 }}</td>
                                        <td>{{ $item->p10 }}</td>
                                        <td>{{ $item->p11 }}</td>
                                        <td>{{ $item->p12 }}</td>
                                        <td>{{ $item->p13 }}</td>
                                        <td>{{ $item->p14 }}</td>
                                        <td>{{ $item->p15 }}</td>
                                        <td>{{ $item->p16 }}</td>
                                        <td>{{ $item->p17 }}</td>
                                        <td>{{ $item->p18 }}</td>
                                        <td>{{ $item->p19 }}</td>
                                        <td>{{ $item->p20 }}</td>
                                        <td>{{ $item->p21 }}</td>
                                        <td>{{ $item->p22 }}</td>
                                        <td>{{ $item->p23 }}</td>
                                        <td>{{ $item->p24 }}</td>
                                        <td>{{ $item->p25 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
