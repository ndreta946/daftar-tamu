@extends('dashboard')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Profil Pengguna</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <h5 class="card-title">Nama: {{ Auth::user()->nama }}</h5>
                <p class="card-text">Username: {{ Auth::user()->username }}</p>
                <p class="card-text">Jabatan: {{ Auth::user()->jabatan }}</p>
                <p class="card-text">Role: {{ Auth::user()->role }}</p>
            </div>
        </div>
    </div>
@endsection
