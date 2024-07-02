<!doctype html>
<html lang="en">
<head>
    <title>Edit Tamu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Edit Buku Tamu</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url('{{ asset('images/bg-1.jpg') }}');"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Form Edit Buku Tamu</h3>
                            </div>
                        </div>
                        <form action="{{ route('daftar.update', $tamu->id) }}" method="POST" class="signin-form">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label class="label" for="nik">Nik</label>
                                <input id="nik" type="text" class="form-control" name="nik" value="{{ $tamu->nik }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" name="nama" value="{{ $tamu->nama }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="tlp">No. Telepon</label>
                                <input type="text" id="tlp" class="form-control" name="tlp" value="{{ $tamu->tlp }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" required>{{ $tamu->alamat }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="keperluan">Keperluan</label>
                                <textarea name="keperluan" id="keperluan" class="form-control" required>{{ $tamu->keperluan }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="tanggal">Tanggal</label>
                                <input type="date" id="tanggal" class="form-control" name="tanggal" value="{{ $tamu->tanggal }}" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
