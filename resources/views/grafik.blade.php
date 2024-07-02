@extends('dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Grafik Jumlah Tamu Masuk Per Bulan</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <canvas id="guestChart" width="400" height="200"></canvas>
        </div>
    </div>

    @if(count($guestData) > 0)
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        var ctx = document.getElementById('guestChart').getContext('2d');
        var guestChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Jumlah Tamu',
                    data: @json($guestData),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    datalabels: {
                        color: '#333',
                        anchor: 'center',
                        align: 'center',
                        formatter: function(value, context) {
                            return value; // Display the raw value as the label
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Tamu'
                        },
                        ticks: {
                            callback: function(value, index, values) {
                                if (value % 5 === 0) {
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        });
    </script>
    @endif

    <h2 class="h3 mb-4 text-gray-800">Daftar Tamu</h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        @foreach ($daftar as $tamu)
                        <tr>
                            <td>{{ $tamu->id }}</td>
                            <td>{{ $tamu->nik }}</td>
                            <td>{{ $tamu->nama }}</td>
                            <td>{{ $tamu->tlp }}</td>
                            <td>{{ $tamu->alamat }}</td>
                            <td>{{ $tamu->keperluan }}</td>
                            <td>{{ \Carbon\Carbon::parse($tamu->tanggal)->setTimezone('Asia/Makassar')->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($tamu->time_in)->setTimezone('Asia/Makassar')->format('H:i') }}</td>
                            <td>
                                @if ($tamu->time_out)
                                    {{ \Carbon\Carbon::parse($tamu->time_out)->setTimezone('Asia/Makassar')->format('H:i') }}
                                @else
                                    <form action="{{ route('daftar.time-out', $tamu->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Time Out</button>
                                    </form>
                                @endif
                            </td>
                            <td>{{ $tamu->petugas }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
