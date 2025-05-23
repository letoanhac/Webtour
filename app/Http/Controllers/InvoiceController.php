<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    public function generateInvoice($bookingID)
    {
        $userID = Session::get('userID');
        if (!$userID) {
            return $this->notLoggedInResponse();
        }

        $booking = Booking::findOrFail($bookingID);
        if ($booking->userID != $userID) {
            abort(403, 'Bạn không có quyền thực hiện thao tác này.');
        }
        $invoice = new Invoice();
        $invoice->bookingID = $bookingID;
        $invoice->amount = $booking->totalPrice;
        $invoice->dateIssued = now();
        $invoice->details = 'Hóa đơn cho booking ID: ' . $bookingID;
        $invoice->save();

        return redirect()->route('invoice.view', ['bookingID' => $bookingID])
                         ->with('success', 'Hóa đơn đã được tạo thành công.');
    }
    public function viewInvoice($bookingID)
    {
        $userID = Session::get('userID');
        if (!$userID) {
            return $this->notLoggedInResponse();
        }
        $booking = Booking::findOrFail($bookingID);
        if ($booking->userID != $userID) {
            abort(403, 'Bạn không có quyền xem hóa đơn này.');
        }

        $invoice = Invoice::where('bookingID', $bookingID)->first();

        return view('User.invoice', compact('booking', 'invoice'));
    }

    protected function notLoggedInResponse()
    {
        return response('
            <div style="font-family: Arial; padding: 30px; text-align: center;">
                <h2>Bạn chưa đăng nhập</h2>
                <p>Vui lòng đăng nhập để tiếp tục.</p>
                <a href="' . route('showlogin') . '" 
                   style="display: inline-block; margin-top: 15px; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
                   Đến trang đăng nhập
                </a>
            </div>
        ');
    }
}
