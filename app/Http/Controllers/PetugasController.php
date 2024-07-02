<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function showRegisterForm()
    {
        return view('register'); // Pastikan view 'register' ada di resources/views
    }

    // In PetugasController.php
    public function register(Request $request)
    { 
    Log::info('Register method called');
    Log::info($request->all());

    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:petugas',
        'password' => 'required|string|min:5',
        'role' => 'required|string|in:petugas,admin',
    ]);

    // Buat petugas baru
    $petugas = new Petugas;
    $petugas->nama = $request->nama;
    $petugas->jabatan = $request->jabatan;
    $petugas->username = $request->username;
    $petugas->password = Hash::make($request->password); // Hash password
    $petugas->role = $request->role; // Save role
    $petugas->save();

    // Redirect dengan pesan sukses ke halaman login
    return redirect()->route('petugas.register_form')->with('success', 'Registrasi berhasil! Silakan login.');
    }

}
