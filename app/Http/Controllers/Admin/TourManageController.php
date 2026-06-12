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
        $data['domain'] = $data['domain'] ?? 'b';
        $data['tag'] = $data['tag'] ?? 'Chưa có tag';
        $data['description'] = $data['description'] ?? 'Chưa có mô tả';
        $data['quantity'] = $data['quantity'] ?? 0;
        $data['quantityleft'] = $data['quantity'] ?? 0;
        $data['priceAdult'] = $data['priceAdult'] ?? 0;
        $data['priceChild'] = $data['priceChild'] ?? 0;
        $data['time'] = $data['time'] ?? 'Chưa có thông tin';
        $data['destination'] = $data['destination'] ?? 'Chưa rõ';
        $data['startDate'] = $data['startDate'] ?? now();
        $data['endDate'] = $data['endDate'] ?? now()->addDays(1);
        
        // Calculate availability
        $now = \Carbon\Carbon::now();
        $startDate = \Carbon\Carbon::parse($data['startDate']);
        $endDate = \Carbon\Carbon::parse($data['endDate']);
        $data['availability'] = ($now->between($startDate, $endDate)) ? 1 : 0;

        Tour::create($data);
        return redirect()->route('admin.tour.index')->with('success', 'Đã thêm tour mới! Vui lòng cập nhật Chi tiết Tour.');
    }
    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);
        $data = $request->all();
        $paidBookings = Booking::where('tourID', $id)
            ->where('paymentStatus', 'Đã thanh toán')
            ->count();
        $data['quantityleft'] = max(0, $request->quantity - $paidBookings);
        
        // Calculate availability
        if (isset($data['startDate']) && isset($data['endDate'])) {
            $now = \Carbon\Carbon::now();
            $startDate = \Carbon\Carbon::parse($data['startDate']);
            $endDate = \Carbon\Carbon::parse($data['endDate']);
            $data['availability'] = ($now->between($startDate, $endDate)) ? 1 : 0;
        }

        $tour->update($data);
        return redirect()->route('admin.tour.index')->with('success', 'Đã cập nhật tour!');
    }
    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);
        $canDelete = \Carbon\Carbon::parse($tour->endDate)->isPast() || Booking::where('tourID', $id)->count() == 0;
        if (!$canDelete) {
            return redirect()->route('admin.tour.index')->with('error', 'Không thể xóa tour đang mở bán và đã có lượt đặt!');
        }

        Image::where('tourID', $id)->delete();

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
        return redirect()->back()->with('success', 'Đã thêm ảnh cho tour!');
    }

    public function updateImage(Request $request, $id)
    {
        $image = Image::findOrFail($id);
        $image->update([
            'imageURL' => $request->imageURL,
            'description' => $request->description
        ]);
        return redirect()->back()->with('success', 'Đã cập nhật ảnh!');
    }

    public function deleteImage($id)
    {
        Image::destroy($id);
        return redirect()->back()->with('success', 'Đã xoá ảnh!');
    }
    public function manageImage($tourID)
    {
        $tour = Tour::with('images')->findOrFail($tourID);
        return view('Admin.TourImageManage', compact('tour'));
    }
    public function manageInfo($tourID)
    {
        $tour = Tour::findOrFail($tourID);
        return view('Admin.TourInfoManage', compact('tour'));
    }

    public function updateInfo(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);
        $data = $request->only(['domain', 'tag', 'description', 'quantity', 'priceAdult', 'priceChild', 'time', 'destination', 'startDate', 'endDate']);
        
        $paidBookings = Booking::where('tourID', $id)
            ->where('paymentStatus', 'Đã thanh toán')
            ->count();
            
        $data['quantityleft'] = max(0, $request->quantity - $paidBookings);
        
        // Calculate availability
        if (isset($data['startDate']) && isset($data['endDate'])) {
            $now = \Carbon\Carbon::now();
            $startDate = \Carbon\Carbon::parse($data['startDate']);
            $endDate = \Carbon\Carbon::parse($data['endDate']);
            $data['availability'] = ($now->between($startDate, $endDate)) ? 1 : 0;
        }

        $tour->update($data);
        
        return redirect()->route('admin.tour.index')->with('success', 'Đã cập nhật thông tin tour!');
    }
}
