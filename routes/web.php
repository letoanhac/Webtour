<?php
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\TourManageController;
use App\Http\Controllers\Admin\UserController;


// Trang chủ
Route::get('/', function () {
    return view('welcome');
});

// Chi tiết tour
Route::get('/tour/{id}', [TourController::class, 'show'])->name('tour.show');

// Trang đặt tour (hiển thị form đặt tour)
Route::get('/Booking/{tourID}', [BookingController::class, 'index'])->name('booking.index');

// Các trang tĩnh khác
Route::get('/Chat', function () {
    return view('User.Chat');
})->name('chat');

Route::get('/Payment', function () {
    return view('User.Payment');
})->name('payment');

Route::get('/Review', function () {
    return view('User.Review');
})->name('review');

Route::get('/home', function () {
    return view('User.home');
})->name('home');

Route::get('/tour-list', function () {
    return view('User.Tour_List');
})->name('tourlist');

// Route xử lý đặt tour
Route::post('/booking', [BookingController::class, 'submit'])->name('booking.submit');

// Route xử lý thanh toán
Route::get('/checkout/{checkoutID}', [CheckoutController::class, 'show'])->name('checkout.show'); 
Route::post('/checkout/{checkoutID}', [CheckoutController::class, 'process'])->name('checkout.process');

// Route cho các phương thức thanh toán
Route::get('/checkout/cash/{bookingID}', [CheckoutController::class, 'cash'])->name('checkout.cash');
Route::get('/checkout/bank/{bookingID}', [CheckoutController::class, 'qr'])->name('checkout.bank');
Route::get('/checkout/credit/{bookingID}', [CheckoutController::class, 'credit'])->name('checkout.credit');
Route::get('/checkout/momo/{bookingID}', [CheckoutController::class, 'momo'])->name('checkout.momo');

// Route tạo hóa đơn
Route::get('/invoice/generate/{bookingID}', [InvoiceController::class, 'generateInvoice'])->name('invoice.generate');

// Route xem hóa đơn
Route::get('/invoice/view/{bookingID}', [InvoiceController::class, 'viewInvoice'])->name('invoice.view');

Route::prefix('admin/tour')->name('admin.tour.')->group(function () {
    Route::get('/', [TourManageController::class, 'index'])->name('index');
    Route::post('/store', [TourManageController::class, 'store'])->name('store');
    Route::post('/update/{id}', [TourManageController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [TourManageController::class, 'destroy'])->name('destroy');
    Route::post('/image/add', [TourManageController::class, 'addImage'])->name('image.add');
    Route::post('/image/update/{id}', [TourManageController::class, 'updateImage'])->name('image.update');
    Route::delete('/image/delete/{id}', [TourManageController::class, 'deleteImage'])->name('image.delete');
    Route::get('/image/manage/{tourID}', [TourManageController::class, 'manageImage'])->name('image.manage');
});
Route::prefix('admin/usermanage')->name('admin.usermanage.')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});
