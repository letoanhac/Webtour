<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Tour;
use App\Models\Booking;
use App\Models\User;
use App\Models\Checkout;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index($tourID)
    {
        $tour = Tour::findOrFail($tourID);

        $userID = Session::get('userID');
        if (!$userID) {
            return response('
                <div style="font-family: Arial; padding: 30px; text-align: center;">
                    <h2>Bạn chưa đăng nhập</h2>
                    <p>Vui lòng đăng nhập để đặt tour.</p>
                    <a href="' . route('showlogin') . '" 
                       style="display: inline-block; margin-top: 15px; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
                       Đến trang đăng nhập
                    </a>
                </div>
            ');
        }

        $user = User::findOrFail($userID);

        return view('User.Booking', compact('tour', 'user'));
    }
    public function submit(Request $request)
    {
        $userID = Session::get('userID');
        if (!$userID) {
            return response('
                <div style="font-family: Arial; padding: 30px; text-align: center;">
                    <h2>Bạn chưa đăng nhập</h2>
                    <p>Vui lòng đăng nhập để đặt tour.</p>
                    <a href="' . route('login') . '" 
                       style="display: inline-block; margin-top: 15px; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
                       Đến trang đăng nhập
                    </a>
                </div>
            ');
        }

        $request->validate([
            'tourID' => 'required|exists:tour,tourID',
            'numAdults' => 'required|integer|min:0',
            'numChildren' => 'required|integer|min:0',
            'bookingDate' => 'required|date',
            'paymentMethod' => 'required|string',
            'specialRequests' => 'nullable|string',
        ]);

        $tour = Tour::findOrFail($request->tourID);

        $totalPrice = ($request->numAdults * $tour->priceAdult) + ($request->numChildren * $tour->priceChild);
        $booking = new Booking();
        $booking->tourID = $request->tourID;
        $booking->userID = $userID;
        $booking->bookingDate = $request->bookingDate;
        $booking->numAdults = $request->numAdults;
        $booking->numChildren = $request->numChildren;
        $booking->totalPrice = $totalPrice;
        $booking->paymentStatus = 'Chờ xác nhận từ admin';
        $booking->specialRequests = $request->specialRequests;
        $booking->save();
        \App\Models\History::create([
            'bookingID' => $booking->bookingID,
            'userID' => $booking->userID,
            'tourID' => $booking->tourID,
            'actionType' => 'Đặt tour',
            'timestamp' => now(),
        ]);
        $checkout = new Checkout();
        $checkout->bookingID = $booking->bookingID;
        $checkout->paymentMethod = $request->paymentMethod;
        $checkout->paymentDate = now();
        $checkout->paymentStatus = 'Chờ xác nhận từ admin';
        $checkout->transactionID = null;
        $checkout->save();
        $invoice = new Invoice();
        $invoice->bookingID = $booking->bookingID;
        $invoice->amount = $totalPrice;
        $invoice->dateIssued = now();
        $invoice->details = 'Đặt tour #' . $booking->bookingID;
        $invoice->save();
        switch ($request->paymentMethod) {
            case 'Tiền mặt':
                return redirect()->route('checkout.cash', ['bookingID' => $booking->bookingID]);
            case 'Chuyển khoản':
                return redirect()->route('checkout.bank', ['bookingID' => $booking->bookingID]);
            case 'Thẻ tín dụng':
                return redirect()->route('checkout.credit', ['bookingID' => $booking->bookingID]);
            case 'Momo':
                return redirect()->route('checkout.momo', ['bookingID' => $booking->bookingID]);
            default:
                return back()->with('error', 'Phương thức thanh toán không hợp lệ');
        }
    }
    public function manage()
    {
        $bookings = DB::table('booking')
            ->join('checkout', 'booking.bookingID', '=', 'checkout.bookingID')
            ->select('booking.*', 'checkout.checkoutID', 'checkout.paymentMethod', 'checkout.paymentDate', 'checkout.paymentStatus as checkoutStatus', 'checkout.transactionID')
            ->get()
            ->map(function ($item) {
                $item->paymentStatus = $item->paymentStatus ?? $item->checkoutStatus;
                return $item;
            });

        return view('Admin.BookingManage', compact('bookings'));
    }
    public function updateStatus(Request $request, $bookingID)
    {
        $newStatus = $request->paymentStatus;
        $booking = Booking::findOrFail($bookingID);
        $booking->paymentStatus = $newStatus;
        $booking->save();

        $checkout = Checkout::where('bookingID', $bookingID)->first();
        if ($checkout) {
            $checkout->paymentStatus = $newStatus;
            $checkout->save();
        }
        if ($newStatus === 'Đã thanh toán') {
            $tour = Tour::find($booking->tourID);
            if ($tour && $tour->quantity > 0) {
                $tour->availability = $tour->availability - 1;
                $tour->save();
            }
        }
        else if ($newStatus === 'Đang chờ thanh toán') {
            $tour = Tour::find($booking->tourID);
            if ($tour && $tour->quantity > 0) {
                $tour->availability = $tour->availability + 1;
                $tour->save();
            }
        }
        return redirect()->back()->with('success', 'Cập nhật trạng thái thanh toán thành công!');
    }
}
