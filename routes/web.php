<?php

use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TourManageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\clients\FacebookController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clients\HomeController;
use App\Http\Controllers\clients\InformationController;
use App\Http\Controllers\clients\TourListController;
use App\Http\Controllers\clients\LoginController;
use App\Http\Controllers\clients\LoginGoogleController;
use App\Http\Controllers\clients\SearchController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\VnpayController;
use App\Http\Controllers\ChatController;

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

Route::controller(FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/handle', 'handle')->name('facebook.return');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

//Search
Route::get('/search', [SearchController::class, 'index'])-> name('search');
Route::get('/tours-mien-{domain}', [HomeController::class, 'showToursByDomain'])
    ->where('domain', '[nbt]')
    ->name('tours.by.domain');


// Chi tiết tour
Route::get('/tour/{id}', [TourController::class, 'show'])->name('tour.show');


Route::get('/reviews/index', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/create/{tourID}', [ReviewController::class, 'create'])->name('reviews.create');

//Route lịch sử
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
Route::get('/history/latest', [HistoryController::class, 'getLatestBooking']);

// Route xử lý đặt tour
Route::post('/booking', [BookingController::class, 'submit'])->name('booking.submit');
Route::get('/booking/{bookingID}', [BookingController::class, 'show'])->name('booking.show');
Route::get('/Booking/{tourID}', [BookingController::class, 'index'])->name('booking.index');

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
Route::get('/invoice/viewadmin/{bookingID}',[InvoiceController::class,'viewInvoiceAdmin'])->name('invoice.admin.view');

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

Route::get('/admin-report', [ReportController::class, 'index'])-> name('admin.report');

Route::get('/vnpay-pay/{bookingID}', [VnpayController::class, 'createPayment'])->name('vnpay.payment');
Route::get('/vnpay-return', [VnpayController::class, 'vnpayReturn'])->name('vnpay.return');

Route::get('/chatmode', function (\Illuminate\Http\Request $request) {
    if (!session()->has('userID') && !session()->has('adminID')) {
        return redirect('/user-login')->with('error', 'Bạn chưa đăng nhập.');
    }

    $peerID = $request->query('peer'); // adminID
    if (!$peerID) {
        return redirect('/chat/select-admin')->with('error', 'Vui lòng chọn người hỗ trợ.');
    }

    return view('chatmode', compact('peerID'));
});

Route::get('/chat-users', function () {
    $adminID = session('adminID');

    if (!$adminID) {
        return redirect('/login')->with('error', 'Chỉ admin mới có quyền xem danh sách này.');
    }
    $path = base_path('node-chat/profilechat.json');
    if (!file_exists($path)) {
        return view('chatuserlist', ['users' => []]);
    }

    $json = json_decode(file_get_contents($path), true);
    $users = $json[$adminID] ?? [];
    return view('chatuserlist', compact('users'));
})->name('list-chat');
Route::get('/chat/select-admin', [ChatController::class, 'selectAdmin'])->name('select-admin');
Route::get('/chat/{tourID}', [ChatController::class, 'show'])->name('chat.show');
