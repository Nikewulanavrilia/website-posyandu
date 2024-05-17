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
use App\Http\Controllers\DataPosyanduController;

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
    Route::get('/jadwal-posyandu', [JadwalController::class, 'index'])->name('pages.jadwal');
    Route::get('/data-posyandu', [PenimbanganController::class, 'index'])->name('pages.penimbangan');
    Route::get('/edukasi', [ArtikelController::class, 'index'])->name('pages.edukasi');
    Route::get('/pengaturan-akun', [PengaturanAkunController::class, 'index'])->name('pages.pengaturanakun');
    //route pages pengaturan akun
    Route::get('/pengaturan-akun/create', [PengaturanAkunController::class, 'create'])->name('pengaturanakun.create');
    Route::get('/pengaturan-akun/cari', [PengaturanAkunController::class, 'cari'])->name('pengaturanakun.cari');
    Route::post('/pengaturan-akun/store', [PengaturanAkunController::class, 'store'])->name('pengaturanakun.store');
    Route::get('/pengaturan-akun/edit/{id}', [PengaturanAkunController::class, 'edit'])->name('pengaturanakun.edit');
    Route::put('/pengaturan-akun/update/{id}', [PengaturanAkunController::class, 'update'])->name('pengaturanakun.update');
    Route::get('/pengaturan-akun/hapus/{id}', [PengaturanAkunController::class, 'destroy'])->name('pengaturanakun.hapus');
    //route pages data ibu
    Route::get('/data-orangtua/cari', [DataIbuController::class, 'cari'])->name('data_ibu.cari');
    Route::get('/data-orangtua/edit/{no_kk}', [DataIbuController::class, 'edit'])->name('data_ibu.edit');
    Route::put('/data-orangtua/update/{no_kk}', [DataIbuController::class, 'update'])->name('data_ibu.update');
    Route::get('/data-orangtua/hapus/{no_kk}', [DataIbuController::class, 'destroy'])->name('data_ibu.hapus');
    Route::get('/data-orangtua/detail/{no_kk}', [DataIbuController::class, 'getOrtuDetail'])->name('data_ibu.detail');
    //route pages data anak
    Route::get('/data-anak/create', [DataAnakController::class, 'create'])->name('data_anak.create');
    Route::get('/data-anak/cari', [DataAnakController::class, 'cari'])->name('data_anak.cari');
    Route::post('/data-anak/store', [DataAnakController::class, 'store'])->name('data_anak.store');
    Route::post('/data-ibu/search', [DataAnakController::class, 'search'])->name('data_anak.search');
    Route::get('/data-anak/edit/{nik_anak}', [DataAnakController::class, 'edit'])->name('data_anak.edit');
    Route::put('/data-anak/update/{nik_anak}', [DataAnakController::class, 'update'])->name('data_anak.update');
    Route::get('/data-anak/hapus/{nik_anak}', [DataAnakController::class, 'destroy'])->name('data_anak.hapus');
    Route::get('/data-anak/detail/{nik_anak}', [DataAnakController::class, 'getAnakDetail'])->name('data_anak.detail');
    //route pages data imunisasi
    Route::get('/data-imunisasi/create', [DataImunisasiController::class, 'create'])->name('data_imunisasi.create');
    Route::get('/data-imunisasi/cari', [DataImunisasiController::class, 'cari'])->name('data_imunisasi.cari');
    Route::post('/data-imunisasi/store', [DataImunisasiController::class, 'store'])->name('data_imunisasi.store');
    Route::get('/data-imunisasi/edit/{id_vaksin}', [DataImunisasiController::class, 'edit'])->name('data_imunisasi.edit');
    Route::put('/data-imunisasi/update/{id_vaksin}', [DataImunisasiController::class, 'update'])->name('data_imunisasi.update');
    Route::get('/data-imunisasi/hapus/{id_vaksin}', [DataImunisasiController::class, 'destroy'])->name('data_imunisasi.hapus');
    //route pages riwayat jadwal posyandu
    Route::get('/jadwal-posyandu/create', [JadwalController::class, 'create'])->name('jadwal_posyandu.create');
    Route::post('/jadwal-posyandu/store', [JadwalController::class, 'store'])->name('jadwal_posyandu.store');
    Route::get('/jadwal-posyandu/edit/{id_jadwal}', [JadwalController::class, 'edit'])->name('jadwal_posyandu.edit');
    Route::put('/jadwal-posyandu/update/{id_jadwal}', [JadwalController::class, 'update'])->name('jadwal_posyandu.update');
    Route::get('/jadwal-posyandu/hapus/{id_jadwal}', [JadwalController::class, 'destroy'])->name('jadwal_posyandu.hapus');
    //route pages edukasi
    Route::get('/edukasi/create', [ArtikelController::class, 'create'])->name('edukasi.create');
    Route::post('/edukasi/store', [ArtikelController::class, 'store'])->name('edukasi.store');
    Route::get('/edukasi/edit/{id_edukasi}', [ArtikelController::class, 'edit'])->name('edukasi.edit');
    Route::put('/edukasi/update/{id_edukasi}', [ArtikelController::class, 'update'])->name('edukasi.update');
    Route::get('/edukasi/hapus/{id_edukasi}', [ArtikelController::class, 'destroy'])->name('edukasi.hapus');
     //route pages data posyandu
     Route::get('/data-posyandu/create', [PenimbanganController::class, 'create'])->name('data_posyandu.create');
     Route::get('/data-posyandu/cari', [PenimbanganController::class, 'cari'])->name('data_posyandu.cari');
     Route::get('/data-posyandu/create-terlambat', [DataPosyanduController::class, 'create'])->name('data_posyandu.create_terlambat');
     Route::post('/data-posyandu/store', [PenimbanganController::class, 'store'])->name('data_posyandu.store');
     Route::get('/data-posyandu/edit/{id_jadwal}', [PenimbanganController::class, 'edit'])->name('data_posyandu.edit');
     Route::put('/data-posyandu/update/{id_jadwal}', [PenimbanganController::class, 'update'])->name('data_posyandu.update');
     Route::get('/data-posyandu/hapus/{id_jadwal}', [PenimbanganController::class, 'destroy'])->name('data_posyandu.hapus');
     Route::get('/pilih-data-anak', [PenimbanganController::class, 'getDataPosyandu'])->name('data_posyandu.getDataPosyandu');
     Route::get('/data-vaksin', [PenimbanganController::class, 'getDataVaksin'])->name('data_posyandu.getDataVaksin');
     Route::get('/first-vaksin', [PenimbanganController::class, 'getDataFirstVaksin'])->name('data_posyandu.getDataFirstVaksin');
});
