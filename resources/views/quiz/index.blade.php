@extends('template.main')
@section('title', 'Responden')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Formulir Kuisioner
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Kuisioner</li>
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
            <form action="{{ route('quiz.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; gap: 20px;">
                            <p>Berikut adalah range nilai dari setiap pilihan:</p>
                            <span><strong>1</strong> = Tidak Puas</span>
                            <span><strong>2</strong> = Cukup Puas</span>
                            <span><strong>3</strong> = Puas</span>
                            <span><strong>4</strong> = Sangat Puas</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="responsive">
                            <div class="mb-3" hidden>
                                <label for="responden" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="responden" id="responden"
                                    value="{{ Auth::user()->name }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="jenkel" class="form-label">Jenis Kelamin</label>
                                <select id="jenkel" class="form-select" name="jenkel">
                                    <option value="">Pilih</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="usia" class="form-label">Usia</label>
                                <input type="number" class="form-control" id="usia" placeholder="Masukkan usia"
                                    name="usia">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kehandalan Section -->
                <div class="card">
                    <div class="card-header">
                        <h1>Kehandalan</h1>
                    </div>
                    <div class="card-body">
                        <div class="responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kuisioner</th>
                                        <th>P1</th>
                                        <th>P2</th>
                                        <th>P3</th>
                                        <th>P4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kehandalan as $index => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->pertanyaan }}</td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 1 }}" value="1"> 1
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 1 }}" value="2"> 2
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 1 }}" value="3"> 3
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 1 }}" value="4"> 4
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Daya Tanggap Section -->
                <div class="card mt-2">
                    <div class="card-header">
                        <h1>Daya Tanggap</h1>
                    </div>
                    <div class="card-body">
                        <div class="responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kuisioner</th>
                                        <th>P1</th>
                                        <th>P2</th>
                                        <th>P3</th>
                                        <th>P4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dayatanggap as $index => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->pertanyaan }}</td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 6 }}" value="1"> 1
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 6 }}" value="2"> 2
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 6 }}" value="3"> 3
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 6 }}" value="4"> 4
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Jaminan Section -->
                <div class="card mt-2">
                    <div class="card-header">
                        <h1>Jaminan</h1>
                    </div>
                    <div class="card-body">
                        <div class="responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kuisioner</th>
                                        <th>P1</th>
                                        <th>P2</th>
                                        <th>P3</th>
                                        <th>P4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jaminan as $index => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->pertanyaan }}</td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 11 }}" value="1"> 1
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 11 }}" value="2"> 2
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 11 }}" value="3"> 3
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 11 }}" value="4"> 4
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Empati Section -->
                <div class="card mt-2">
                    <div class="card-header">
                        <h1>Empati</h1>
                    </div>
                    <div class="card-body">
                        <div class="responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kuisioner</th>
                                        <th>P1</th>
                                        <th>P2</th>
                                        <th>P3</th>
                                        <th>P4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empati as $index => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->pertanyaan }}</td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 16 }}" value="1"> 1
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 16 }}" value="2"> 2
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 16 }}" value="3"> 3
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 16 }}" value="4"> 4
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Fisik Section -->
                <div class="card mt-2">
                    <div class="card-header">
                        <h1>Fisik</h1>
                    </div>
                    <div class="card-body">
                        <div class="responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kuisioner</th>
                                        <th>P1</th>
                                        <th>P2</th>
                                        <th>P3</th>
                                        <th>P4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fisik as $index => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->pertanyaan }}</td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 21 }}" value="1"> 1
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 21 }}" value="2"> 2
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 21 }}" value="3"> 3
                                            </td>
                                            <td>
                                                <input type="radio" name="p{{ $index + 21 }}" value="4"> 4
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Kirim</button>
            </form>


        </div>
    </div>
@endsection
