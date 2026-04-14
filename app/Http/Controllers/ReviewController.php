<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tour;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $tourID = $request->input('tourID');
        $tour = Tour::findOrFail($tourID);
        $allReviews = Review::where('tourID', $tourID);
        $totalReviews = $allReviews->count();
        $avgRating = $totalReviews > 0 ? number_format($allReviews->avg('rating'), 1) : '0.0';
        $reviews = Review::with('user')
            ->where('tourID', $tourID)
            ->orderBy('created_at', 'desc')
            ->paginate(4);

        return view('User.Review', compact('reviews', 'tourID', 'tour', 'totalReviews', 'avgRating'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tourID' => 'required|integer|exists:tour,tourID',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);
        $userID = session('userID');
        if (!$userID) {
            return redirect()->back()->with('error', 'Bạn cần đăng nhập để đánh giá.');
        }
        $hasPaidBooking = Booking::where('tourID', $request->tourID)
            ->where('userID', $userID)
            ->where('paymentStatus', 'Đã thanh toán')
            ->exists();
        if (!$hasPaidBooking) {
            return redirect()->back()->with('error', 'Chỉ người dùng đã thanh toán mới được đánh giá.');
        }
        $pointMap = [5 => 5, 4 => 4, 3 => 3, 2 => 2, 1 => 1];
        $point = $pointMap[(int)$request->rating] ?? 0;

        Review::create([
            'tourID'    => $request->tourID,
            'userID'    => $userID,
            'rating'    => $point,
            'comment'   => $request->comment,
            'timestamp' => now(),
        ]);
        return redirect()->route('tour.show', ['id' => $request->tourID])
                        ->with('success', 'Cảm ơn bạn đã đánh giá!');
    }
    public function create($tourID)
    {
        $tour = Tour::findOrFail($tourID);
        return view('User.RatingForUserHasBooking', compact('tour', 'tourID'));
    }
}
