<?php
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourListController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginGoogleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TourManageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InformationController;

// Chi tiết tour
Route::get('/tour/{id}', [TourController::class, 'show'])->name('tour.show');

// Trang đặt tour (hiển thị form đặt tour)
Route::get('/Booking/{tourID}', [BookingController::class, 'index'])->name('booking.index');

// Các trang tĩnh khác
//Route::get('/Chat', function () {
 //   return view('User.Chat');
//})->name('chat');

//Route::get('/Payment', function () {
//    return view('User.Payment');
//})->name('payment');

Route::get('/reviews/index', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/create/{tourID}', [ReviewController::class, 'create'])->name('reviews.create');

Route::get('/list', [TourListController::class, 'index'])-> name('tourList');
Route::get('/',[TourController::class,'index'])->name('home.index');

Route::get('/login', [AuthController::class, 'showLogin'])->name('showlogin');//login ng dùng
Route::post('/login', [AuthController::class, 'login'])->name('user-login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');//dky người dùng
Route::post('/register', [AuthController::class, 'register'])->name('user-register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//Route lịch sử
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
Route::get('/history/latest', [HistoryController::class, 'getLatestBooking']);

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
    Route::get('/itinerary/{tourID}', [ItineraryController::class, 'index'])->name('itineraries.index');
    Route::post('/itinerary/{tourID}/store', [ItineraryController::class, 'store'])->name('itineraries.store');
    Route::post('/itinerary/{tourID}/update/{itineraryID}', [ItineraryController::class, 'update'])->name('itineraries.update');
    Route::post('/itinerary/{tourID}/delete/{itineraryID}', [ItineraryController::class, 'delete'])->name('itineraries.delete');
});
Route::prefix('admin/usermanage')->name('admin.usermanage.')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});
Route::prefix('admin')->group(function () {
    Route::get('/booking-manage', [BookingController::class, 'manage'])->name('admin.booking.manage');
    Route::put('/booking/update-status/{bookingID}', [BookingController::class, 'updateStatus'])->name('admin.booking.updateStatus');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('admins', [AdminController::class, 'index'])->name('admins.index');
    Route::post('admins', [AdminController::class, 'store'])->name('admins.store');
    Route::put('admins/{id}', [AdminController::class, 'update'])->name('admins.update');
    Route::delete('admins/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');
    Route::get('login', [AdminController::class, 'showLogin'])->name('login.form');
    Route::post('login', [AdminController::class, 'login'])->name('login');
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
});
Route::get('/user-profile', [InformationController::class, 'index'])-> name('user-profile');
Route::post('/user-profile', [InformationController::class, 'update'])-> name('update-user-profile');
Route::post('/change_password', [InformationController::class, 'changePassword'])-> name('change_password');
Route::post('/change-avatar-profile', [InformationController::class, 'changeAvatar'])-> name('change-avatar');

Route::get('/admin-report', [ReportController::class, 'index'])-> name('admin.report');


