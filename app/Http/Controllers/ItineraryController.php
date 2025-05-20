<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Itinerary;

class ItineraryController extends Controller
{
    public function showByTour($id)
    {
        $tour = Tour::findOrFail($id);

        $itineraries = Itinerary::where('tourID', $id)->orderBy('day', 'asc')->get();

        return view('user.blocks.itinerary', compact('tour', 'itineraries'));
    }
    public function index($tourID)
    {
        $tour = Tour::findOrFail($tourID);
        $itineraries = Itinerary::where('tourID', $tourID)->orderBy('day')->get();

        return view('admin.ItineraryAdmin', compact('tour', 'itineraries'));
    }
    public function store(Request $request, $tourID)
    {
        $request->validate([
            'day' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'information' => 'nullable|string',
        ]);

        Itinerary::create([
            'tourID' => $tourID,
            'day' => $request->day,
            'title' => $request->title,
            'description' => $request->description,
            'information' => $request->information,
        ]);

        return redirect()->route('admin.tour.itineraries.index', $tourID)->with('success', 'Thêm lịch trình thành công');
    }

    public function update(Request $request, $tourID, $itineraryID)
    {
        $request->validate([
            'day' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'information' => 'nullable|string',
        ]);

        $item = Itinerary::where('tourID', $tourID)->where('itineraryID', $itineraryID)->firstOrFail();

        $item->update([
            'day' => $request->day,
            'title' => $request->title,
            'description' => $request->description,
            'information' => $request->information,
        ]);

        return redirect()->route('admin.tour.itineraries.index', $tourID)->with('success', 'Cập nhật lịch trình thành công');
    }

    // Xóa lịch trình
    public function delete($tourID, $itineraryID)
    {
        $item = Itinerary::where('tourID', $tourID)->where('itineraryID', $itineraryID)->firstOrFail();
        $item->delete();

        return redirect()->route('admin.tour.itineraries.index', $tourID)->with('success', 'Xóa lịch trình thành công');
    }

}
