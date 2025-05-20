<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\clients\InformationController;
use App\Http\Controllers\clients\TourListController;
use App\Http\Controllers\clients\LoginController;
use App\Http\Controllers\clients\LoginGoogleController;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])-> name('home');

Route::get('/login', [LoginController::class, 'index'])-> name('login');
Route::post('/register', [LoginController::class, 'register'])-> name('register');
Route::post('/login', [LoginController::class, 'login'])-> name('user-login');
Route::get('/logout', [LoginController::class, 'logout'])-> name('logout');
Route::get('activate-account/{token}', [LoginController::class, 'activateAccount'])->name('activate.account');

// Login google

Route::get('auth/google', [LoginGoogleController::class,'redirectToGoogle'])->name('login-google');
Route::get('auth/google/callback', [LoginGoogleController::class,'handleGoogleCallback']);


//get tours, filter tours
Route::get('/list', [TourListController::class, 'index'])-> name('tourList');
Route::get('/filter-tours', [TourListController::class, 'filterTours'])-> name('filter-tours');


//user-profile
Route::get('/user-profile', [InformationController::class, 'index'])-> name('user-profile');
Route::post('/user-profile', [InformationController::class, 'update'])-> name('update-user-profile');
Route::post('/change_password', [InformationController::class, 'changePassword'])-> name('change_password');
Route::post('/change-avatar-profile', [InformationController::class, 'changeAvatar'])-> name('change-avatar');




