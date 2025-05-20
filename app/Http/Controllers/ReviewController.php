<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $tourID = $request->input('tourID');

        if (!$tourID) {
            abort(404, 'Tour ID không hợp lệ');
        }

        $reviews = Review::with('user')
            ->where('tourID', $tourID)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('User.Review', compact('reviews', 'tourID'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tourID' => 'required|integer|exists:tour,id', // Bảng tour số ít
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $pointMap = [
            5 => 10,
            4 => 8,
            3 => 6,
            2 => 4,
            1 => 2,
        ];

        $star = (int) $request->input('rating');
        $point = $pointMap[$star] ?? 0;

        Review::create([
            'tourID'   => $request->input('tourID'),
            'userID'   => Auth::id() ?? 1,
            'rating'   => $point,
            'comment'  => $request->input('comment'),
            'timestamp' => Carbon::now(),
        ]);

        return redirect()->route('tour.show', ['id' => $request->input('tourID')])
                         ->with('success', 'Cảm ơn bạn đã đánh giá!');
    }
}
