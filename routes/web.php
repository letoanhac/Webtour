<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tour-detail', function () {//chi tiết tour
    return view('User.Tour_Detail');
})->name('tourdetail');
Route::get('/Chat', function () {//chatbox
    return view('User.Chat');
});
Route::get('/Booking', function () {//đặt tour 
    return view('User.Booking');
})->name('booking');
Route::get('/Payment', function () {//thanh toán
    return view('User.Payment');
});
Route::get('/Review', function () {//Đánh giá
    return view('User.Review');
})->name('review');
Route::get('/home', function () {//Đánh giá
    return view('User.home');
})->name('home');

