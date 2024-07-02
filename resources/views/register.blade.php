@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Register Petugas</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(images/bg-3.jpg);"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Form Register</h3>
                            </div>
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('petugas.register') }}" method="POST" class="signin-form">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="label" for="nama">Nama Petugas</label>
                                <input type="text" id="nama" class="form-control" placeholder="Nama" name="nama" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="jabatan">Jabatan</label>
                                <input type="text" id="jabatan" class="form-control" placeholder="Jabatan" name="jabatan" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="username">Username</label>
                                <input type="text" id="username" class="form-control" placeholder="Username" name="username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="role">Role</label>
                                <select id="role" class="form-control" name="role" required>
                                    <option value="petugas">Petugas</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Register</button>
                            </div>
                            <a href="{{ url('/') }}">Kembali ke Halaman Utama</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
