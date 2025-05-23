<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Image;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TourManageController extends Controller
{
    public function index()
    {
        $tours = Tour::with('images')->get();
        return view('Admin.TourManage', compact('tours'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['availability'] = $request->quantity;
        Tour::create($data);
        return redirect()->route('admin.tour.index')->with('success', 'Đã thêm tour mới!');
    }
    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);
        $data = $request->all();
        $paidBookings = Booking::where('tourID', $id)
            ->where('paymentStatus', 'Đã thanh toán')
            ->count();
        $data['availability'] = max(0, $request->quantity - $paidBookings);
        $tour->update($data);
        return redirect()->route('admin.tour.index')->with('success', 'Đã cập nhật tour!');
    }

    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);
        $tour->delete();
        return redirect()->route('admin.tour.index')->with('success', 'Đã xoá tour!');
    }

    public function addImage(Request $request)
    {
        Image::create([
            'tourID' => $request->tourID,
            'imageURL' => $request->imageURL,
            'description' => $request->description,
            'uploadDate' => now()
        ]);
        return redirect()->route('admin.tour.index')->with('success', 'Đã thêm ảnh cho tour!');
    }

    public function updateImage(Request $request, $id)
    {
        $image = Image::findOrFail($id);
        $image->update([
            'imageURL' => $request->imageURL,
            'description' => $request->description
        ]);
        return redirect()->route('admin.tour.index')->with('success', 'Đã cập nhật ảnh!');
    }

    public function deleteImage($id)
    {
        Image::destroy($id);
        return redirect()->route('admin.tour.index')->with('success', 'Đã xoá ảnh!');
    }
    public function manageImage($tourID)
    {
        $tour = Tour::with('images')->findOrFail($tourID);
        return view('Admin.TourImageManage', compact('tour'));
    }
}
