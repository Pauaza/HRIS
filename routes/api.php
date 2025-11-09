<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\CheckClocksController;
use App\Http\Controllers\API\CheckClockSettingsController;
use App\Http\Controllers\API\CheckClockSettingTimesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Di sini tempat Anda dapat mendaftarkan rute API untuk aplikasi Anda.
| Rute-rute ini dimuat oleh RouteServiceProvider dalam grup yang
| ditetapkan middleware "api". Nikmati membangun API Anda!
|
*/

// Contoh rute dasar yang sudah ada (untuk mendapatkan user yang sedang login)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ---------------------------------------------------------------------
// RESOURCE ROUTES UNTUK HRIS/CHECK-CLOCK
// Menggunakan Route::apiResource karena ini adalah API RESTful murni
// ---------------------------------------------------------------------

// 1. Manajemen Pengguna (users)
Route::apiResource('users', UsersController::class);

// 2. Riwayat Check Clock (check-clocks)
Route::apiResource('check-clocks', CheckClocksController::class);

// 3. Pengaturan Shift/Jadwal Utama (check-clock-settings)
Route::apiResource('check-clock-settings', CheckClockSettingsController::class);

// 4. Detail Waktu Shift/Jadwal (check-clock-setting-times)
// Bergantung pada check-clock-settings (ck_settings_id sebagai foreign key)
Route::apiResource('check-clock-setting-times', CheckClockSettingTimesController::class);