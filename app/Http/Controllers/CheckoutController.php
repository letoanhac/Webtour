<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function cash($bookingID)
    {
        $userID = Session::get('userID');
        if (!$userID) {
            return $this->notLoggedInResponse();
        }
        $booking = Booking::findOrFail($bookingID);
        if ($booking->userID != $userID) {
            abort(403, 'Bạn không có quyền truy cập.');
        }

        return view('payment.cash', compact('booking'));
    }
    public function qr($bookingID)
    {
        $userID = Session::get('userID');
        if (!$userID) {
            return $this->notLoggedInResponse();
        }

        $booking = Booking::findOrFail($bookingID);
        if ($booking->userID != $userID) {
            abort(403, 'Bạn không có quyền truy cập.');
        }

        return view('payment.bank', compact('booking'));
    }
    public function credit($bookingID)
    {
        $userID = Session::get('userID');
        if (!$userID) {
            return $this->notLoggedInResponse();
        }

        $booking = Booking::findOrFail($bookingID);
        if ($booking->userID != $userID) {
            abort(403, 'Bạn không có quyền truy cập.');
        }

        return view('payment.credit', compact('booking'));
    }
    public function momo($bookingID)
    {
        $userID = Session::get('userID');
        if (!$userID) {
            return $this->notLoggedInResponse();
        }

        $booking = Booking::findOrFail($bookingID);
        if ($booking->userID != $userID) {
            abort(403, 'Bạn không có quyền truy cập.');
        }

        return view('payment.momo', compact('booking'));
    }
    public function show($checkoutID)
    {
        $checkout = Checkout::with('booking')->find($checkoutID);

        if (!$checkout) {
            return redirect()->route('admin.booking.manage')->with('error', 'Không tìm thấy đơn thanh toán.');
        }

        switch ($checkout->paymentMethod) {
            case 'Tiền mặt':
                return redirect()->route('checkout.cash', ['bookingID' => $checkout->bookingID]);
            case 'Chuyển khoản':
                return redirect()->route('checkout.bank', ['bookingID' => $checkout->bookingID]);
            case 'Thẻ tín dụng':
                return redirect()->route('checkout.credit', ['bookingID' => $checkout->bookingID]);
            case 'Momo':
                return redirect()->route('checkout.momo', ['bookingID' => $checkout->bookingID]);
            default:
                return back()->with('error', 'Phương thức thanh toán không hợp lệ.');
        }
    }
    public function process(Request $request, $bookingID)
    {
        $userID = Session::get('userID');
        if (!$userID) {
            return $this->notLoggedInResponse();
        }
        $booking = Booking::findOrFail($bookingID);
        if ($booking->userID != $userID) {
            abort(403, 'Bạn không có quyền thực hiện thao tác này.');
        }

        if ($booking->paymentStatus === 'Đã thanh toán') {
            return redirect()->route('booking.index', ['tourID' => $booking->tourID])
                             ->with('info', 'Đơn này đã thanh toán rồi.');
        }

        $checkout = new Checkout();
        $checkout->bookingID = $bookingID;
        $checkout->paymentMethod = $request->paymentMethod;
        $checkout->paymentDate = now();
        $checkout->paymentStatus = 'Đã thanh toán';
        $checkout->transactionID = uniqid();
        $checkout->save();

        $booking->paymentStatus = 'Đã thanh toán';
        $booking->save();

        return redirect()->route('booking.index', ['tourID' => $booking->tourID])
                         ->with('success', 'Thanh toán thành công!');
    }

    protected function notLoggedInResponse()
    {
        return response('
            <div style="font-family: Arial; padding: 30px; text-align: center;">
                <h2>Bạn không có quyền</h2>
                <p>Vui lòng đăng nhập đúng tài khoản để tiếp tục.</p>
                <a href="' . route('showlogin') . '" 
                   style="display: inline-block; margin-top: 15px; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
                   Đến trang đăng nhập
                </a>
            </div>
        ');
    }
}
