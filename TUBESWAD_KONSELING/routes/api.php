<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalKonselingController;



Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('jadwal', JadwalKonselingController::class);
});



