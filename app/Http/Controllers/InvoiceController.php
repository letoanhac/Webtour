<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function generateInvoice($bookingID)
    {
        $booking = Booking::findOrFail($bookingID);

        $invoice = new Invoice();
        $invoice->bookingID = $bookingID;
        $invoice->amount = $booking->totalPrice;
        $invoice->dateIssued = now();
        $invoice->details = 'Hóa đơn cho booking ID: ' . $bookingID;
        $invoice->save();

        return redirect()->route('invoice.view', ['bookingID' => $bookingID])->with('success', 'Hóa đơn đã được tạo thành công.');
    }

    public function viewInvoice($bookingID)
    {
        $booking = Booking::findOrFail($bookingID);
        $invoice = Invoice::where('bookingID', $bookingID)->first();

        return view('User.invoice', compact('booking', 'invoice'));
    }
}
