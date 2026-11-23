<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman publik
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'welcome']);
Route::get('/remake', [DashboardController::class, 'welcome']);
Route::get('/portal', fn () => view('portal'));
Route::get('/skm', fn () => view('skm'));
Route::get('/terimakasih', fn () => view('terimakasih'));

// dashboard publik (hasil SKM)
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// kirim jawaban survei
Route::post('nilaiUnsur', [NilaiUnsurController::class, 'store'])->name('nilaiUnsur.store');

// login admin (dibatasi 10 percobaan per menit)
Route::get('/login', [DashboardController::class, 'login'])->name('login');
Route::post('dashboard', [DashboardController::class, 'store'])->name('dashboard.store')->middleware('throttle:10,1');
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Halaman admin: wajib login
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->group(function () {
    Route::get('dashboardAdmin/create', [DashboardController::class, 'create'])->name('dashboardAdmin.create');
    Route::get('nilaiUnsur', [NilaiUnsurController::class, 'index'])->name('nilaiUnsur.index');
    Route::get('nilaiRekap', [NilaiController::class, 'index'])->name('nilaiRekap.index');
    Route::resource('rekapTotal', RekapTotalController::class)->only(['index', 'destroy']);
    Route::resource('pengaturanAdmin', PengaturanController::class)->only(['index', 'store', 'update', 'destroy']);

    Route::get('export', [WordController::class, 'export'])->name('export');
    Route::get('exportResume', [ExportController::class, 'exportResume'])->name('exportResume');
    Route::get('exportNilaiUnsur', [ExportController::class, 'exportNilaiUnsur'])->name('exportNilaiUnsur');
});
