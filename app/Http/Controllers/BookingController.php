<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function showBookings()
    {
        $bookings = Booking::with('user')->get();

        return view('booking', compact('bookings'));
    }
}
?>