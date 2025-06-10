<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonselorController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('konselor', KonselorController::class);
