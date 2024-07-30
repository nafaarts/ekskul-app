<?php

use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\KegiatanEkstrakurikulerController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Ekstrakurikuler;
use App\Models\KegiatanEkstrakurikuler;
use App\Models\Pendaftar;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// halaman utama
Route::get('/', function () {
    // ambil 5 foto random dari kegiatan.
    $galeri = KegiatanEkstrakurikuler::inRandomOrder()->limit(5)->get();
    // ambil 4 ekstrakurikuler secara random.
    $ekstrakurikuler = Ekstrakurikuler::inRandomOrder()->limit(4)->get();

    return view('beranda', [
        'galeri' => $galeri,
        'ekstrakurikuler' => $ekstrakurikuler
    ]);
})->name('beranda');

// halaman ekstrakurikuler
Route::get('/ekstrakurikuler', function () {
    $ekstrakurikuler = Ekstrakurikuler::all();

    return view('ekstrakurikuler', [
        'ekstrakurikuler' => $ekstrakurikuler
    ]);
})->name('ekstrakurikuler');

// halaman galeri
Route::get('/galeri', function () {
    $galeri = KegiatanEkstrakurikuler::all();

    return view('galeri', [
        'galeri' => $galeri
    ]);
})->name('galeri');

// halaman tentang
Route::view('/tentang', 'tentang')->name('tentang');

// halaman pendaftaran
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('daftar.index');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('daftar.store');

// halaman admin (harus login)
Route::prefix('admin')->group(function () {
    // halaman dashboard
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'jumlah_user' => User::count(),
            'jumlah_ekstrakurikuler' => Ekstrakurikuler::count(),
            'jumlah_pendaftar' => Pendaftar::count()
        ]);
    })->name('dashboard');

    // halaman data users
    Route::resource('users', UserController::class)->except('show');

    // halaman data ekstrakurikuler
    Route::resource('ekstrakurikuler', EkstrakurikulerController::class)->except('show');

    // halaman data kegiatan
    Route::resource('kegiatan', KegiatanEkstrakurikulerController::class)->except(['create', 'show', 'edit']);

    // halaman data kelas
    Route::resource('kelas', KelasController::class)->except('show');

    // halaman data pendaftar
    Route::resource('pendaftar', PendaftarController::class)->except(['show']);

    // halaman profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
})->middleware('auth');

require __DIR__ . '/auth.php';
