<!doctype html>
<html lang="en">
<head>
    <title>Buku Tamu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .table th, .table td {
            padding: 1rem; /* menambahkan padding untuk memperbesar kolom */
        }
        .action-buttons a,
        .action-buttons form {
            margin: 0 0.5rem; /* menambahkan margin horizontal antara tombol */
        }
        .logout-button {
            margin-left: auto; /* Memindahkan tombol logout ke paling kanan */
        }
        .greeting {
            text-align: right;
            margin-bottom: 1rem;
        }
        .logout-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 1rem;
        }
        .wrap.d-md-flex {
            flex-wrap: wrap;
            justify-content: center;
            width: 100%; /* memperbesar lebar */
        }
        .wrap .login-wrap {
            width: 100%;
        }
        .wrap .img {
            width: 100%;
            max-width: 600px;
            height: auto;
        }
        .ftco-section {
            padding: 4em 0; /* memperbesar tinggi section */
        }
        .container {
            max-width: 1400px; /* memperbesar lebar kontainer */
        }
        .table-container {
            overflow-x: auto; /* Menambahkan scroll horizontal */
            -webkit-overflow-scrolling: touch; /* Smooth scrolling pada iOS */
        }
        .table {
            width: 100%; /* Memastikan tabel lebar penuh */
        }

    .table th,
    .table td {
        padding: 0.5rem; /* Mengurangi padding pada seluruh sel */
        font-size: 0.9rem; /* Mengurangi ukuran font */
    }
    .table-container {
        overflow-x: auto; /* Menambahkan scroll horizontal jika diperlukan */
        -webkit-overflow-scrolling: touch; /* Smooth scrolling di iOS */
        max-width: 100%; /* Mengatur maksimum lebar tabel */
    }
    .table th,
    .table td {
        padding: 0.5rem; /* Mengurangi padding pada seluruh sel */
        font-size: 0.9rem; /* Mengurangi ukuran font */
        word-wrap: break-word; /* Memastikan teks panjang akan pindah baris jika perlu */
    }
    .table-container {
        overflow-x: auto; /* Menambahkan scroll horizontal jika diperlukan */
        -webkit-overflow-scrolling: touch; /* Smooth scrolling di iOS */
        max-width: 100%; /* Mengatur maksimum lebar tabel */
    }

    </style>
</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Buku Tamu</h2>
            </div>
            <div class="col-md-6 text-right mb-5 greeting">
                <h6>Halo, {{ Auth::guard('petugas')->user()->nama }}</h6>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(images/bg-1.jpg);"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Form Buku Tamu</h3>
                            </div>
                        </div>
                        <form action="{{ route('daftar.store') }}" method="POST" class="signin-form">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="label" for="nik">Nik</label>
                                <input id="nik" type="text" class="form-control" placeholder="31xxxxxxxx" name="nik" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" placeholder="Nama" name="nama" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="tlp">No. Telepon</label>
                                <input type="text" id="tlp" class="form-control" placeholder="08xxxxxxxxx" name="tlp" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Jl....." required></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="keperluan">Keperluan</label>
                                <textarea name="keperluan" id="keperluan" class="form-control" placeholder="Ingin bertemu / Apa yang ingin dilakukan" required></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="tanggal">Tanggal</label>
                                <input type="date" id="tanggal" class="form-control" name="tanggal" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Input</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="container table-container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="login-wrap p-4 p-md-5 w-100">
                        <div class="col-md-12 text-center mb-5">
                            <h2 class="heading-section">Daftar Tamu</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center mx-auto">
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
                                        <th>Aksi</th>
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
                                        <td class="d-flex justify-content-center">
                                                <a href="{{ route('daftar.edit', $tamu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="logout-container">
                            @auth
                                <a href="{{ route('dashboard') }}" class="btn btn-primary ml-3">Dashboard</a>
                            @endauth


                            @if(auth()->user() && auth()->user()->role === 'admin')
                                <!-- Tombol untuk ekspor PDF -->
                                <button class="btn btn-primary ml-3" data-toggle="modal" data-target="#exportModal">Export PDF</button>
                                {{-- <a href="{{ route('dashboard') }}" class="btn btn-primary ml-3">Dashboard</a> --}}
                                <!-- Modal untuk form ekspor PDF -->
                                <div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exportModalLabel">Export Data Tamu ke PDF</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('export.pdf') }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="start_date">Tanggal Awal</label>
                                                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="end_date">Tanggal Akhir</label>
                                                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Export PDF</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <!-- Tombol Logout -->
                            <a href="{{ route('logout') }}" class="btn btn-secondary logout-button"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
