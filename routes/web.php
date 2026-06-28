<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpustakaanController;

Route::get('/', function () {
    return view('welcome');
});

// Route menggunakan Controller
Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('perpus.home');
Route::get('/buku/{id}', [PerpustakaanController::class, 'show']);
Route::get('/about', [PerpustakaanController::class, 'about']);

// Route baru - return text
Route::get('/hello', function () {
    return 'Hello dari Laravel!';
});

// Route dengan HTML
Route::get('/info', function () {
    return '<h1>Sistem Perpustakaan</h1><p>Selamat datang!</p>';
});

// Route dengan JSON
Route::get('/buku', function () {
    return [
        'judul' => 'Laravel Programming',
        'pengarang' => 'John Doe',
        'harga' => 150000
    ];
});

// Route dengan parameter optional
Route::get('/kategori/{nama?}', function ($nama = 'Semua Kategori') {
    return "Menampilkan kategori: " . $nama;
});

// Route dengan multiple parameters
Route::get('/search/{kategori}/{keyword}', function ($kategori, $keyword) {
    return "Cari buku kategori: $kategori dengan keyword: $keyword";
});

// Test Named Route
Route::get('/test-route', function () {
    return "URL perpustakaan: " . route('perpus.home');
});