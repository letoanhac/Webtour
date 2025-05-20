<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function cash($bookingID)
    {
        $booking = Booking::findOrFail($bookingID);
        return view('payment.cash', compact('booking'));
    }

    public function qr($bookingID)
    {
        $booking = Booking::findOrFail($bookingID);
        return view('payment.bank', compact('booking'));
    }

    public function credit($bookingID)
    {
        $booking = Booking::findOrFail($bookingID);
        return view('payment.credit', compact('booking'));
    }

    public function momo($bookingID)
    {
        $booking = Booking::findOrFail($bookingID);
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
        $booking = Booking::findOrFail($bookingID);
        if ($booking->paymentStatus === 'Đã thanh toán') {
            return redirect()->route('booking.index', ['tourID' => $booking->tourID])
                             ->with('info', 'Đơn này đã thanh toán rồi.');
        }
        $checkout = new Checkout();
        $checkout->bookingID = $bookingID;
        $checkout->paymentMethod = $request->paymentMethod; // truyền từ form
        $checkout->paymentDate = now();
        $checkout->paymentStatus = 'Đã thanh toán';
        $checkout->transactionID = uniqid();
        $checkout->save();

        $booking->paymentStatus = 'Đã thanh toán';
        $booking->save();

        return redirect()->route('booking.index', ['tourID' => $booking->tourID])
                         ->with('success', 'Thanh toán thành công!');
    }
}
