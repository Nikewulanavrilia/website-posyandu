<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataAnakController;
use App\Http\Controllers\DataIbuController;
use App\Http\Controllers\DataImunisasiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PengaturanAkunController;
use App\Http\Controllers\PenimbanganController;
use App\Http\Controllers\RiwayatImunisasiController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['web'])->group(function () {
    Route::redirect('/', '/login');
    Auth::routes();

    Route::match(["GET","POST"],"/register",function(){
        return redirect('login');
    })->name("register");
    Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/data-anak', [DataAnakController::class, 'index'])->name('pages.data_anak');
    Route::get('/data-ibu', [DataIbuController::class, 'index'])->name('pages.data_ibu');
    Route::get('/data-imunisasi', [DataImunisasiController::class, 'index'])->name('pages.data_imunisasi');
    Route::get('/riwayat-imunisasi', [RiwayatImunisasiController::class, 'index'])->name('pages.riwayat_imunisasi');
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('pages.jadwal');
    Route::get('/penimbangan', [PenimbanganController::class, 'index'])->name('pages.penimbangan');
    Route::get('/artikel', [ArtikelController::class, 'index'])->name('pages.artikel');
    Route::get('/settings', [SettingsController::class, 'index'])->name('pages.settings');
    Route::get('/pengaturan-akun', [PengaturanAkunController::class, 'index'])->name('pages.pengaturanakun');
    Route::get('/pengaturan-akun/create', [PengaturanAkunController::class, 'create'])->name('pengaturanakun.create');
    Route::post('/pengaturan-akun/store', [PengaturanAkunController::class, 'store'])->name('pengaturanakun.store');
    Route::get('/pengaturan-akun/edit/{id}', [PengaturanAkunController::class, 'edit'])->name('pengaturanakun.edit');
    Route::put('/pengaturan-akun/update/{id}', [PengaturanAkunController::class, 'update'])->name('pengaturanakun.update');
    Route::get('/pengaturan-akun/hapus/{id}', [PengaturanAkunController::class, 'destroy'])->name('pengaturanakun.hapus');
});
