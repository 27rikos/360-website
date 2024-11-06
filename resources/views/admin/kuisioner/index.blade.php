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
                    <a href="{{ route('kuisioner.create') }}" class="btn btn-primary"><i
                            class="ti ti-plus fs-2 me-2"></i>Tambah</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-2" id="exampleModalLabel">Import Kuisioner</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('import-kuisioner') }}" method="POST" enctype="multipart/form-data">
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
                                    <th>Kuisioner</th>
                                    <th>Kriteria</th>
                                    <th>P1</th>
                                    <th>P2</th>
                                    <th>P3</th>
                                    <th>P4</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->pertanyaan }}</td>
                                        <td>{{ $item->kriteria }}</td>
                                        <td>{{ $item->p1 }}</td>
                                        <td>{{ $item->p2 }}</td>
                                        <td>{{ $item->p3 }}</td>
                                        <td>{{ $item->p4 }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('kuisioner.edit', $item->id) }}" class="btn btn-azure"><i
                                                        class="ti ti-edit fs-2"></i></a>
                                                <form action="{{ route('kuisioner.destroy', $item->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit"><i
                                                            class="ti ti-trash-x fs-2"></i></button>
                                                </form>
                                            </div>
                                        </td>
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
