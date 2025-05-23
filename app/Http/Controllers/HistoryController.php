<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HistoryController extends Controller
{
    public function index()
    {
        $userID = Session::get('userID');

        if (!$userID) {
            return response('
                <div style="font-family: Arial; padding: 30px; text-align: center;">
                    <h2>Bạn chưa đăng nhập</h2>
                    <p>Vui lòng đăng nhập để xem lịch sử đặt tour.</p>
                    <a href="' . route('showlogin') . '" 
                       style="display: inline-block; margin-top: 15px; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">
                       Đến trang đăng nhập
                    </a>
                </div>
            ');
        }
        $histories = History::with('booking')
            ->where('userID', $userID)
            ->orderByDesc('timestamp')
            ->get();

        return view('User.history', compact('histories'));
    }
    public function getLatestBooking(Request $request)
    {
        $userID = Session::get('userID');

        if (!$userID) {
            return response()->json(['error' => 'Bạn chưa đăng nhập'], 401);
        }
        $latest = Booking::where('userID', $userID)
            ->orderByDesc('bookingDate')
            ->first();
        return response()->json($latest);
    }
}
