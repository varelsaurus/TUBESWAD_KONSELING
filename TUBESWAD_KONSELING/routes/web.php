<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonselorController;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return redirect('/login');
    return redirect('/login'); 
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource('konselor', KonselorController::class);
// Route::middleware(['auth:sanctum', 'verified'])->group(function () {
Route::get('/keluhan', [KeluhanController::class, 'index'])->name('keluhan.index');
Route::get('/keluhan/create', [KeluhanController::class, 'create'])->name('keluhan.create');
Route::post('/keluhan', [KeluhanController::class, 'store'])->name('keluhan.store');
Route::get('/keluhan/{id}', [KeluhanController::class, 'show'])->name('keluhan.show');
Route::get('/keluhan/{id}/edit', [KeluhanController::class, 'edit'])->name('keluhan.edit');

Route::put('/keluhan/{id}', [KeluhanController::class, 'update'])->name('keluhan.update');
Route::delete('/keluhan/{id}', [KeluhanController::class, 'destroy'])->name('keluhan.destroy');    
// });
