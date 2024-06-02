<?php

use App\Http\Controllers\api\DataAnakApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DataOrtuApiController;
use App\Http\Controllers\api\EdukasiApiController;
use App\Http\Controllers\api\JadwalApiController;

Route::post('auth/register', [DataOrtuApiController::class, 'register']);
Route::post('auth/login', [DataOrtuApiController::class, 'login']);
Route::post('auth/check-email', [DataOrtuApiController::class, 'checkEmail']);
Route::post('auth/change-password', [DataOrtuApiController::class, 'changePassword']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('auth/me', [DataOrtuApiController::class, 'me']);
    Route::post('auth/logout', [DataOrtuApiController::class, 'logout']);
    Route::get('auth/dataProfile', [DataOrtuApiController::class, 'dataProfile']);
    Route::put('auth/updateProfile', [DataOrtuApiController::class, 'updateProfile']);
    Route::get('auth/dataAnak',[DataAnakApiController::class, 'dataAnak']);
    Route::get('auth/dataGrafik',[DataAnakApiController::class, 'dataGrafik']);
    Route::get('auth/dataImunisasi',[DataAnakApiController::class, 'dataImunisasi']);
});

Route::get('/edukasi', [EdukasiApiController::class, 'edukasi']);
Route::get('/jadwal-posyandu', [JadwalApiController::class, 'schedule']);