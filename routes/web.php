<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('surat-masuk', SuratMasukController::class);
    Route::get('/surat-masuk', [SuratMasukController::class, 'index'])
        ->name('surat-masuk.index');
    Route::post('/surat-masuk', [SuratMasukController::class, 'store'])
        ->name('surat-masuk.store');

    Route::resource('surat-keluar', SuratKeluarController::class);
    Route::get('/surat-keluar', [SuratKeluarController::class, 'index'])
        ->name('surat-keluar.index');
    Route::post('/surat-keluar', [SuratKeluarController::class, 'store'])
        ->name('surat-keluar.store');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
