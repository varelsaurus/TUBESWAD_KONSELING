<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\MahasiswaController;

// Route::middleware(['auth:sanctum', 'verified'])->group(function () {

// Route::post('/api/keluhan', [KeluhanController::class, 'store'])->name('keluhan.store');
// Route::put('/api/keluhan/{id}', [KeluhanController::class, 'update'])->name('keluhan.update');
// Route::delete('/keluhan/{id}', [KeluhanController::class, 'destroy'])->name('keluhan.destroy');

// Route::middleware(['auth:sanctum', 'verified'])->group(function () {

Route::get('/keluhan', [KeluhanController::class, 'index']);
Route::get('/keluhan/{id}', [KeluhanController::class, 'show']);
Route::post('/keluhan', [KeluhanController::class, 'store']);
Route::put('/keluhan/{id}', [KeluhanController::class, 'update']);
Route::delete('/keluhan/{id}', [KeluhanController::class, 'destroy']);
