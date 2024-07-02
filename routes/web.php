<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TamuController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;


// Rute untuk halaman utama setelah login (index)
// In web.php
Route::middleware('auth:petugas')->group(function () {
    Route::get('/', [TamuController::class, 'index'])->name('daftar.index');
    Route::get('/index', [TamuController::class, 'index'])->name('daftar.index');
    Route::post('/index', [TamuController::class, 'store'])->name('daftar.store');
    Route::get('/{tamu}/edit', [TamuController::class, 'edit'])->name('daftar.edit');
    Route::put('/{tamu}', [TamuController::class, 'update'])->name('daftar.update');
    Route::delete('/{tamu}', [TamuController::class, 'destroy'])->name('daftar.destroy');
    Route::post('/time-out/{id}', [TamuController::class, 'setTimeOut'])->name('daftar.time-out');
    Route::post('/export-pdf', [TamuController::class, 'exportPDF'])->name('export.pdf');   
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/grafik', [DashboardController::class, 'showGrafik'])->name('grafik');
    Route::get('/profile', [DashboardController::class, 'showProfile'])->name('profile');

    
    // Registration route for admins only
    Route::get('/register', [PetugasController::class, 'showRegisterForm'])->name('petugas.register_form')->middleware('can:register-users');
    Route::post('/register', [PetugasController::class, 'register'])->name('petugas.register')->middleware('can:register-users');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Rute untuk halaman utama (sebelum login)
// Route::get('/', function () {
//     return view('/index');
// })->name('/index');


Route::get('daftar/{id}/edit', [TamuController::class, 'edit'])->name('daftar.edit');
Route::put('daftar/{id}', [TamuController::class, 'update'])->name('daftar.update');
Route::get('/create-admin', function () {
    \App\Models\Petugas::create([
        'nama' => 'Admin',
        'username' => 'admin',
        'jabatan' => 'administrator',
        'password' => \Illuminate\Support\Facades\Hash::make('admin123'), // ganti dengan password yang diinginkan
        'role' => 'admin',
    ]);
    
    return 'Admin created successfully!';
});

// Dashboard Routes

