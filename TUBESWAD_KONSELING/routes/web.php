<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonselorController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\JadwalKonselingController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', [JadwalKonselingController::class, 'index'])
    ->middleware(['auth', 'verified', 'role:mahasiswa'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/feedback/{id}/edit', [FeedbackController::class, 'edit'])->name('feedback.edit');
    Route::put('/feedback/{id}', [FeedbackController::class, 'update'])->name('feedback.update');
    Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
});

require __DIR__.'/auth.php';
Route::resource('konselor', KonselorController::class);

Route::get('/keluhan', [KeluhanController::class, 'index'])->name('keluhan.index');
Route::get('/keluhan/create', [KeluhanController::class, 'create'])->name('keluhan.create');
Route::post('/keluhan', [KeluhanController::class, 'store'])->name('keluhan.store');
Route::get('/keluhan/{id}', [KeluhanController::class, 'show'])->name('keluhan.show');
Route::get('/keluhan/{id}/edit', [KeluhanController::class, 'edit'])->name('keluhan.edit');
Route::put('/keluhan/{id}', [KeluhanController::class, 'update'])->name('keluhan.update');
Route::delete('/keluhan/{id}', [KeluhanController::class, 'destroy'])->name('keluhan.destroy');

Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->group(function () {
    Route::get('/jadwal', [JadwalKonselingController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/create', [JadwalKonselingController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal/store', [JadwalKonselingController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/{jadwalKonseling}/edit', [JadwalKonselingController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{jadwalKonseling}', [JadwalKonselingController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{jadwalKonseling}', [JadwalKonselingController::class, 'destroy'])->name('jadwal.destroy');
});