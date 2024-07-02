<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekapan Data Tamu {{ $startDate }} - {{ $endDate }}</title>
    <style>
        /* CSS styling untuk PDF */
        body {
            font-family: Arial, sans-serif;
        }
        @page {
            size: landscape; /* Mengatur orientasi halaman menjadi landscape */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 6px; /* Menyesuaikan padding untuk kenyamanan tampilan */
            font-size: 12px; /* Memperkecil ukuran font */
            text-align: center; /* Pusatkan teks di sel tabel */
        }
        th {
            background-color: #f2f2f2;
        }
        caption {
            caption-side: top;
            margin-bottom: 10px;
            font-size: 16px; /* Menyesuaikan ukuran font caption */
            font-weight: bold;
            text-align: center; /* Pusatkan teks caption */
        }
        h2 {
            text-align: center; /* Pusatkan judul */
        }
        @media print {
            table {
                page-break-inside: auto;
                page-break-after: auto;
            }
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
            thead {
                display: table-header-group;
            }
            tfoot {
                display: table-footer-group;
            }
        }
    </style>
</head>
<body>
    <h2>REKAPAN DATA TAMU</h2>
    <table>
        <caption>{{ \Carbon\Carbon::parse($startDate)->format('j F Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('j F Y') }}</caption>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Keperluan</th>
                <th>Tanggal</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftar as $index => $tamu)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $tamu->nik }}</td>
                    <td>{{ $tamu->nama }}</td>
                    <td>{{ $tamu->tlp }}</td>
                    <td>{{ $tamu->alamat }}</td>
                    <td>{{ $tamu->keperluan }}</td>
                    <td>{{ \Carbon\Carbon::parse($tamu->tanggal)->format('j F Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($tamu->time_in)->format('H:i') }}</td>
                    <td>{{ $tamu->time_out ? \Carbon\Carbon::parse($tamu->time_out)->format('H:i') : '-' }}</td>
                    <td>{{ $tamu->petugas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
