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

        // 1. Danh sách các lượt đặt tour có số tiền lớn nhất (lấy top 10)
        $highestBooking = DB::table('booking')
            ->where('paymentStatus', 'Đã thanh toán')
            ->orderByDesc('totalPrice')
            ->limit(10)
            ->get();

        // 2. Danh sách người dùng có lượt đặt tour thành công nhiều nhất
        $topUser = DB::table('booking')
            ->select('userID', DB::raw('COUNT(*) as total'))
            ->where('paymentStatus', 'Đã thanh toán')
            ->groupBy('userID')
            ->orderByDesc('total')
            ->get();

        // 3. Danh sách các booking đã thanh toán
        $bookingDetails = DB::table('booking')
            ->where('paymentStatus', 'Đã thanh toán')
            ->get();

        // 4. Danh sách các tour được đặt nhiều nhất
        $mostBookedTour = DB::table('booking')
            ->select('tourID', DB::raw('COUNT(*) as total'))
            ->where('paymentStatus', 'Đã thanh toán')
            ->groupBy('tourID')
            ->orderByDesc('total')
            ->get();

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
