<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
        }

        .container {
            max-width: 700px;
            margin: 1rem auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 1.5rem;
        }

        .letter-header {
            text-align: center;
            margin-bottom: 1rem;
        }

        .letter-header h3 {
            font-size: 1.25rem;
            font-weight: bold;
            color: #1f2937;
        }

        .letter-header p {
            font-size: 0.75rem;
            color: #6b7280;
            margin: 0.25rem 0;
        }

        .letter {
            font-size: 0.85rem;
            color: #374151;
        }

        .letter strong {
            color: #1f2937;
        }

        .letter .underline {
            display: inline-block;
            width: 200px;
            border-bottom: 1px solid #000;
            vertical-align: middle;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 0.75rem 0;
        }

        .table th,
        .table td {
            font-size: 0.85rem;
            padding: 0.5rem;
            border: 1px solid #e5e7eb;
            text-align: left;
            color: #374151;
        }

        .table th {
            background-color: #f3f4f6;
            font-weight: bold;
        }

        .footer {
            margin-top: 1rem;
            font-size: 0.85rem;
            text-align: right;
            color: #374151;
        }

        .footer p {
            margin: 0.25rem 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="letter-header">
            <h3>RS STELLA MARRIS</h3>
            <p>Jl. Samanhudi No.20, J A T I, Kec. Medan Maimun, Kota Medan, Sumatera Utara 20152</p>
            <p>Medan, Sumatera Utara</p>
        </div>
        <div class="letter">
            <p><strong>Nomor:</strong> </p>
            <p><strong>Lampiran:</strong> -</p>
            <p><strong>Hal:</strong> Penyampaian Hasil Analisis Kinerja Perawat</p>
            <p>Kepada Yth.</p>
            <p>Direktur RS Stella Marris</p>
            <p>Di Tempat</p>
            <p>Dengan hormat,</p>
            <p>
                Bersama ini kami sampaikan hasil analisis kinerja perawat yang telah dilakukan di RS Stella Marris
                dengan menggunakan parameter penilaian sebagai berikut:
            </p>
        </div>
        <table id="dataTable" class="table">
            <tr>
                <th>Kehandalan</th>
                <td>{{ $data->kehandalan ?? 0 }}</td>
            </tr>
            <tr>
                <th>Daya Tanggap</th>
                <td>{{ $data->tanggap ?? 0 }}</td>
            </tr>
            <tr>
                <th>Jaminan</th>
                <td>{{ $data->jaminan ?? 0 }}</td>
            </tr>
            <tr>
                <th>Empati</th>
                <td>{{ $data->empati ?? 0 }}</td>
            </tr>
            <tr>
                <th>Bukti Fisik</th>
                <td>{{ $data->bukti ?? 0 }}</td>
            </tr>
            <tr>
                <th>Hasil Akhir</th>
                <td>{{ number_format($hasilAkhir, 2) }}</td>
            </tr>
        </table>
        <div class="letter">
            <p>
                Hasil akhir dari analisis kinerja perawat adalah <strong>{{ number_format($hasilAkhir, 2) }}/5</strong>.
            </p>
            <p>
                Analisis ini dilakukan untuk memberikan gambaran mengenai kualitas pelayanan keperawatan di RS Stella
                Marris. Kami berharap hasil ini dapat menjadi dasar untuk evaluasi dan peningkatan layanan kesehatan di
                masa mendatang. Jika diperlukan, kami siap menyampaikan penjelasan lebih rinci.
            </p>
            <p>Demikian surat ini kami sampaikan. Atas perhatian dan kerja sama yang diberikan, kami ucapkan terima
                kasih.</p>
        </div>
        <div class="footer">
            <p>Hormat kami,</p>
            <br><br>
            <p>Administrator</p>
        </div>
    </div>
</body>

</html>
