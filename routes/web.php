<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\clients\TourListController;
use App\Http\Controllers\clients\LoginController;
use App\Http\Controllers\clients\LoginGoogleController;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])-> name('home');
Route::get('/list', [TourListController::class, 'index'])-> name('tourList');
Route::get('/login', [LoginController::class, 'index'])-> name('login');
Route::post('/register', [LoginController::class, 'register'])-> name('register');
Route::post('/login', [LoginController::class, 'login'])-> name('user-login');
Route::get('/logout', [LoginController::class, 'logout'])-> name('logout');
Route::get('activate-account/{token}', [LoginController::class, 'activateAccount'])->name('activate.account');

// Login google

Route::get('auth/google', [LoginGoogleController::class,'redirectToGoogle'])->name('login-google');
Route::get('auth/google/callback', [LoginGoogleController::class,'handleGoogleCallback']);