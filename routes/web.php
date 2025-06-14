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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Admin routes
    Route::middleware('role:admin')->group(function () {
        Route::resource('konselor', KonselorController::class);
        Route::get('konselor/{konselor}/riwayat', [KonselorController::class, 'riwayat'])->name('konselor.riwayat');
    });

    // Konselor routes
    Route::middleware('role:konselor')->group(function () {
        Route::get('/riwayat-konseling', [KonselorController::class, 'riwayatSaya'])->name('konselor.riwayat.saya');
        Route::post('konseling/{id}/tolak', [KonselorController::class, 'tolak'])->name('konseling.tolak');
        Route::post('konseling/{id}/terima', [KonselorController::class, 'terima'])->name('konseling.terima');
    });

    // Mahasiswa routes
    Route::middleware('role:mahasiswa')->group(function () {
        Route::get('/jadwal', [JadwalKonselingController::class, 'index'])->name('jadwal.index');
        Route::get('/jadwal/create', [JadwalKonselingController::class, 'create'])->name('jadwal.create');
        Route::post('/jadwal', [JadwalKonselingController::class, 'store'])->name('jadwal.store');
        Route::get('/jadwal/{konseling}', [JadwalKonselingController::class, 'show'])->name('jadwal.show');
        
        // Feedback routes
        Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
        Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
        Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
        
        // Keluhan routes
        Route::get('/keluhan', [KeluhanController::class, 'index'])->name('keluhan.index');
        Route::get('/keluhan/create', [KeluhanController::class, 'create'])->name('keluhan.create');
        Route::post('/keluhan', [KeluhanController::class, 'store'])->name('keluhan.store');
    });
});

require __DIR__.'/auth.php';
