@extends('template.main')
@section('title', 'Dashboard')
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-primary text-white avatar">
                                                <i class="ti ti-users"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ $respon }} Responden
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-green text-white avatar">
                                                <i class="ti ti-users"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ $kriteria }} kriteria
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table id="dataTable" class="table table-bordered table-hover mt-3" hidden>
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
            <div class="">
                <div id="chart" class="mt-5"></div>
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
