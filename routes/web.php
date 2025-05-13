<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\clients\TourListController;
use App\Http\Controllers\clients\LoginController;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])-> name('home');
Route::get('/list', [TourListController::class, 'index'])-> name('tourList');
Route::get('/login', [LoginController::class, 'index'])-> name('login');

