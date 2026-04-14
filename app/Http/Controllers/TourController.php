<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Itinerary;
use App\Models\Review;
use Carbon\Carbon;

class TourController extends Controller
{
    public function show($id)
    {
        $tour = Tour::find($id);
        if (!$tour) {
            return redirect()->route('tour.index')->with('error', 'Tour not found!');
        }
        $now = Carbon::now();
        $tour->availability = ($now->between($tour->startDate, $tour->endDate)) ? 1 : 0;
        $tour->save();
        $images = Image::where('tourID', $id)->get();
        $allReviews = Review::where('tourID', $id)->with('user');
        $totalReviews = $allReviews->count();
        $avgRating = $totalReviews > 0 ? number_format($allReviews->avg('rating'), 1) : '0.0';
        $reviews = Review::where('tourID', $id)->with('user')->orderBy('timestamp', 'desc')->paginate(4);
        $itineraries = Itinerary::where('tourID', $id)->orderBy('day', 'asc')->get();
        return view('User.Tour_Detail', compact('tour', 'images', 'itineraries', 'reviews', 'totalReviews', 'avgRating'));
    }
    public function index()
    {
        $tours = Tour::all();
        return view('clients.home', compact('tours'));
    }
}
