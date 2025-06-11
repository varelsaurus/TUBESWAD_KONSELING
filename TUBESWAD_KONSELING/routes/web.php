<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalKonselingController;


Route::get('jadwal', [JadwalKonselingController::class, 'index'])->name('jadwal.index');
Route::post('/jadwal/store', [JadwalKonselingController::class, 'store'])->name('jadwal.store');
Route::get('/jadwal/{id}', [JadwalKonselingController::class, 'show'])->name('jadwal.show');
Route::put('/jadwal/{id}', [JadwalKonselingController::class, 'update'])->name('jadwal.update');
Route::delete('/jadwal/{id}', [JadwalKonselingController::class, 'destroy'])->name('jadwal.destroy');




