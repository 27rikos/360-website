@extends('template.main')
@section('title', 'Analisis')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Analisis
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Hasil Analisis</li>
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
                <div class="card-header">
                    <a href="{{ route('analisis.store') }}" class="btn btn-info"><i
                            class="ti ti-analyze fs-2 me-2"></i>Analyze</a>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-hover">
                        <tr>
                            <th>Kehandalan</th>
                            <td class="kehandalan">{{ isset($data->kehandalan) ? $data->kehandalan : 0 }}</td>
                        </tr>
                        <tr>
                            <th>Daya Tanggap</th>
                            <td class="tanggap">{{ isset($data->tanggap) ? $data->tanggap : 0 }}</td>
                        </tr>
                        <tr>
                            <th>Jaminan</th>
                            <td class="jaminan">{{ isset($data->jaminan) ? $data->jaminan : 0 }}</td>
                        </tr>
                        <tr>
                            <th>Empati</th>
                            <td class="empati">{{ isset($data->empati) ? $data->empati : 0 }}</td>
                        </tr>
                        <tr>
                            <th>Bukti Fisik</th>
                            <td class="bukti">{{ isset($data->bukti) ? $data->bukti : 0 }}</td>
                        </tr>
                        <tr>
                            <th>Hasil Akhir</th>
                            <td id="hasilAkhir"></td>
                        </tr>
                    </table>

                    <div id="chart" class="mt-5"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('analyze')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        // Fungsi untuk menghitung rata-rata dan persentase
        function calculateAverage() {
            // Mengambil nilai dari tabel
            const kehandalan = parseFloat(document.querySelector('.kehandalan').innerText);
            const tanggap = parseFloat(document.querySelector('.tanggap').innerText);
            const jaminan = parseFloat(document.querySelector('.jaminan').innerText);
            const empati = parseFloat(document.querySelector('.empati').innerText);
            const bukti = parseFloat(document.querySelector('.bukti').innerText);

            // Menghitung hasil akhir
            const total = kehandalan + tanggap + jaminan + empati + bukti;
            const hasilAkhir = total / 5; // Rata-rata

            // Menampilkan hasil akhir
            document.getElementById('hasilAkhir').innerText = hasilAkhir.toFixed(2); // Dua angka di belakang koma

            // Menghitung persentase untuk chart
            const percentages = [
                (kehandalan / 4) * 100,
                (tanggap / 4) * 100,
                (jaminan / 4) * 100,
                (empati / 4) * 100,
                (bukti / 4) * 100
            ];

            // Render chart dengan data persentase
            renderChart(percentages);
        }

        // Fungsi untuk merender chart
        function renderChart(percentages) {
            var options = {
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val.toFixed(2) + "%"; // Menambahkan simbol persen
                    }
                },
                series: [{
                    name: 'Persentase',
                    data: percentages
                }],
                xaxis: {
                    categories: ['Kehandalan', 'Daya Tanggap', 'Jaminan', 'Empati', 'Bukti Fisik'],
                },
                yaxis: {
                    title: {
                        text: 'Persentase (%)'
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val.toFixed(2) + "%"; // Menampilkan nilai dalam persen saat hover
                        }
                    }
                }
            };

            // Render grafik
            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        }

        // Memanggil fungsi saat halaman dimuat
        window.onload = function() {
            calculateAverage();
        };
    </script>
@endpush
