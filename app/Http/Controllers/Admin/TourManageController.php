<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Image;
use Illuminate\Http\Request;

class TourManageController extends Controller
{
    public function index()
    {
        $tours = Tour::with('images')->get();
        return view('Admin.TourManage', compact('tours'));
    }

    public function store(Request $request)
    {
        Tour::create($request->all());
        return redirect()->route('admin.tour.index')->with('success', 'Đã thêm tour mới!');
    }

    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);
        $tour->update($request->all());
        
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
