<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function showRegister()
    {
        return view('register'); // Ganti nama view ke 'register' dari 'register2'
    }

    public function store(Request $request)
    {
        // Logika untuk menyimpan data registrasi
    }

    public function showGrafik()
    {
        // Query untuk menghitung jumlah tamu per bulan
        $guestCounts = Tamu::selectRaw('MONTH(tanggal) as month, COUNT(*) as total')
            ->groupBy(DB::raw('MONTH(tanggal)'))
            ->orderBy('month')
            ->get();
    
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    
        // Inisialisasi array untuk menyimpan jumlah tamu per bulan
        $guestData = array_fill(0, count($months), 0);
    
        // Mengisi data jumlah tamu ke array berdasarkan hasil query
        foreach ($guestCounts as $guest) {
            $monthIndex = $guest->month - 1; // Index dimulai dari 0
            $guestData[$monthIndex] = $guest->total;
        }
    
        // Ambil semua data tamu untuk daftar tamu
        $daftar = Tamu::all();
    
        return view('grafik', compact('guestData', 'months', 'daftar'));
    }
    

    public function showProfile()
    {
        return view('profile');
    }
}
