<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Image;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function show($id)
    {
        $tour = Tour::find($id);
        if (!$tour) {
            return redirect()->route('tour.index')->with('error', 'Tour not found!');
        }
        $images = Image::where('tourID', $id)->get();
        return view('User.Tour_Detail', compact('tour', 'images'));
    }
}
