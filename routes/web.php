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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
    //route pages
    Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
    Route::get('/lupa-password',[ForgotPasswordController::class,'lupapassword'])->name('lupa-password');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/data-anak', [DataAnakController::class, 'index'])->name('pages.data_anak');
    Route::get('/data-ibu', [DataIbuController::class, 'index'])->name('pages.data_ibu');
    Route::get('/data-imunisasi', [DataImunisasiController::class, 'index'])->name('pages.data_imunisasi');
    Route::get('/riwayat-imunisasi', [RiwayatImunisasiController::class, 'index'])->name('pages.riwayat_imunisasi');
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('pages.jadwal');
    Route::get('/data-posyandu', [PenimbanganController::class, 'index'])->name('pages.penimbangan');
    Route::get('/artikel', [ArtikelController::class, 'index'])->name('pages.artikel');
    Route::get('/pengaturan-akun', [PengaturanAkunController::class, 'index'])->name('pages.pengaturanakun');
    //route pages pengaturan akun
    Route::get('/pengaturan-akun/create', [PengaturanAkunController::class, 'create'])->name('pengaturanakun.create');
    Route::get('/pengaturan-akun/cari', [PengaturanAkunController::class, 'cari'])->name('pengaturanakun.cari');
    Route::post('/pengaturan-akun/store', [PengaturanAkunController::class, 'store'])->name('pengaturanakun.store');
    Route::get('/pengaturan-akun/edit/{id}', [PengaturanAkunController::class, 'edit'])->name('pengaturanakun.edit');
    Route::put('/pengaturan-akun/update/{id}', [PengaturanAkunController::class, 'update'])->name('pengaturanakun.update');
    Route::get('/pengaturan-akun/hapus/{id}', [PengaturanAkunController::class, 'destroy'])->name('pengaturanakun.hapus');
    //route pages data ibu
    Route::get('/data-orangtua/edit/{nik_ibu}', [DataIbuController::class, 'edit'])->name('data_ibu.edit');
    Route::put('/data-orangtua/update/{nik_ibu}', [DataIbuController::class, 'update'])->name('data_ibu.update');
    Route::get('/data-orangtua/hapus/{nik_ibu}', [DataIbuController::class, 'destroy'])->name('data_ibu.hapus');
    //route pages data anak
    Route::get('/data-anak/create', [DataAnakController::class, 'create'])->name('data_anak.create');
    Route::post('/data-anak/store', [DataAnakController::class, 'store'])->name('data_anak.store');
    Route::get('/data-anak/edit/{nik_anak}', [DataAnakController::class, 'edit'])->name('data_anak.edit');
    Route::put('/data-anak/update/{nik_anak}', [DataAnakController::class, 'update'])->name('data_anak.update');
    Route::get('/data-anak/hapus/{nik_anak}', [DataAnakController::class, 'destroy'])->name('data_anak.hapus');
    //route pages data imunisasi
    Route::get('/data-imunisasi/create', [DataImunisasiController::class, 'create'])->name('data_imunisasi.create');
    Route::get('/data-imunisasi/cari', [DataImunisasiController::class, 'cari'])->name('data_imunisasi.cari');
    Route::post('/data-imunisasi/store', [DataImunisasiController::class, 'store'])->name('data_imunisasi.store');
    Route::get('/data-imunisasi/edit/{id_vaksin}', [DataImunisasiController::class, 'edit'])->name('data_imunisasi.edit');
    Route::put('/data-imunisasi/update/{id_vaksin}', [DataImunisasiController::class, 'update'])->name('data_imunisasi.update');
    Route::get('/data-imunisasi/hapus/{id_vaksin}', [DataImunisasiController::class, 'destroy'])->name('data_imunisasi.hapus');
    //route pages riwayat imunisasi
    Route::get('/riwayat-imunisasi/create', [RiwayatImunisasiController::class, 'create'])->name('riwayat_imunisasi.create');
    Route::post('/riwayat-imunisasi/store', [RiwayatImunisasiController::class, 'store'])->name('riwayat_imunisasi.store');
    Route::get('/riwayat-imunisasi/edit/{id_posyandu}', [RiwayatImunisasiController::class, 'edit'])->name('riwayat_imunisasi.edit');
    Route::put('/riwayat-imunisasi/update/{id_posyandu}', [RiwayatImunisasiController::class, 'update'])->name('riwayat_imunisasi.update');
    Route::get('/riwayat-imunisasi/hapus/{id_posyandu}', [RiwayatImunisasiController::class, 'destroy'])->name('riwayat_imunisasi.hapus');
});
