<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Booking;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $userID = 1;
        $histories = History::with('booking')
            ->where('userID', $userID)
            ->orderByDesc('timestamp')
            ->get();

        return view('User.history', compact('histories'));
    }
    public function getLatestBooking(Request $request)
    {
        $userID = 1;
        $latest = Booking::where('userID', $userID)->orderByDesc('bookingDate')->first();
        return response()->json($latest);
    }
}
