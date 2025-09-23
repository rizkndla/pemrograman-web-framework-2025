<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/rahasia', function () {
    return view('ini halaman rahasia');
})->middleware('auth', 'RoleCheck:admin');

Route::get('/product', [ProductController::class, 'index']);

Route::get('/Route_cont/{id}', [ProductController::class, 'show']);

Route::get('/tugas4/{angka}', [ProductController::class, 'indexTugas4'])
    ->middleware(['auth', 'RoleCheck:admin,owner']);


require __DIR__.'/auth.php';