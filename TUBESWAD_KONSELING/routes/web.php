<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->group(function () {
Route::get('/keluhan', [KeluhanController::class, 'index'])->name('keluhan.index');
Route::get('/keluhan/create', [KeluhanController::class, 'create'])->name('keluhan.create');
Route::post('/keluhan', [KeluhanController::class, 'store'])->name('keluhan.store');
Route::get('/keluhan/{id}', [KeluhanController::class, 'show'])->name('keluhan.show');
Route::get('/keluhan/{id}/edit', [KeluhanController::class, 'edit'])->name('keluhan.edit');

Route::put('/keluhan/{id}', [KeluhanController::class, 'update'])->name('keluhan.update');
Route::delete('/keluhan/{id}', [KeluhanController::class, 'destroy'])->name('keluhan.destroy');    
// });