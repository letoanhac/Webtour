<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller {
    public function index()
    {
        $totalBookings = DB::table('booking')->where('paymentStatus', 'Đã thanh toán')->count();
        $totalUsers = DB::table('user')->count();
        $totalRevenue = DB::table('booking')->where('paymentStatus', 'Đã thanh toán')->sum('totalPrice');
        $totalTours = DB::table('tour')->count();

        // 1. Lượt đặt tour có số tiền lớn nhất (full row)
        $highestBooking = DB::table('booking')
            ->where('paymentStatus', 'Đã thanh toán')
            ->orderByDesc('totalPrice')
            ->first();

        // 2. Người dùng có lượt đặt tour thành công nhiều nhất
        $topUser = DB::table('booking')
            ->select('userID', DB::raw('COUNT(*) as total'))
            ->where('paymentStatus', 'Đã thanh toán')
            ->groupBy('userID')
            ->orderByDesc('total')
            ->first();

        // 3. Danh sách các booking đã thanh toán
        $bookingDetails = DB::table('booking')
            ->where('paymentStatus', 'Đã thanh toán')
            ->get();

        // 4. Tour có lượt đặt nhiều nhất
        $mostBookedTour = DB::table('booking')
            ->select('tourID', DB::raw('COUNT(*) as total'))
            ->where('paymentStatus', 'Đã thanh toán')
            ->groupBy('tourID')
            ->orderByDesc('total')
            ->first();

        // 5. Lấy danh sách users và tours để map hiển thị tên
        $users = DB::table('user')->get()->keyBy('userID');
        $tours = DB::table('tour')->get()->keyBy('tourID');

        return view('Admin.Reports', [
            'totalBookings' => $totalBookings,
            'totalUsers' => $totalUsers,
            'totalRevenue' => $totalRevenue,
            'totalTours' => $totalTours,
            'highestBooking' => $highestBooking,
            'topUser' => $topUser,
            'bookingDetails' => $bookingDetails,
            'mostBookedTour' => $mostBookedTour,
            'users' => $users,
            'tours' => $tours,
        ]);
    }
}
