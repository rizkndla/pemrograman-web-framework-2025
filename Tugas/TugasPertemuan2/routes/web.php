<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


// 1. Route Dasar
Route::get('/', function () {
    return "Selamat datang di Perpustakaan Mini!";
});

Route::get('/kontak', function () {
    return "Hubungi kami di: perpustakaan@example.com";
});

// 2. Route dengan Parameter
Route::get('/buku/{id}', function ($id) {
    return "Detail Buku dengan ID: " . $id;
});

// 3. Route dengan Parameter Opsional
Route::get('/anggota/{nama?}', function ($nama = 'Tamu') {
    return "Halo, " . $nama . "! Selamat datang di perpustakaan.";
});

// 4. Named Route + Redirect
Route::get('/profil', function () {
    return "Ini adalah halaman profil perpustakaan.";
})->name('profil');

Route::get('/ke-profil', function () {
    return redirect()->route('profil');
});

// 5. Group Route dengan Prefix
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "Admin Dashboard Perpustakaan";
    });

    Route::get('/koleksi', function () {
        return "Admin Koleksi Buku";
    });
});

// 6. Route dengan Middleware
// (contoh throttle: hanya boleh 5x request/menit)
Route::middleware('throttle:5,1')->get('/laporan', function () {
    return "Halaman laporan (dibatasi 5x request per menit)";
});

// 7. Resource Route (CRUD otomatis)
Route::resource('posts', PostController::class);

// 8. Fallback Route
Route::fallback(function () {
    return "Halaman tidak ditemukan. Silakan kembali ke beranda.";
});
