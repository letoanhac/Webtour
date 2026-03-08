<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Tours;
use Illuminate\Http\Request;
use App\Models\clients\Home;

class HomeController extends Controller
{
    private $homeTours;
    private $tours; 
    
    public function __construct() {
        $this->homeTours = new Home();
        $this->tours = new Tours(); 
    }
    
    public function index()
    {
        $title = 'Trang chủ';
        $tours = $this->homeTours->getHomeTour();
        $toursN = $this->tours->filterTours(['domain' => 'n'])->take(6);
        $toursB = $this->tours->filterTours(['domain' => 'b'])->take(6);
        $toursT = $this->tours->filterTours(['domain' => 't'])->take(6);

        return view('clients.home', compact('title','tours','toursN','toursB','toursT'));
    }

    // Method cập nhật để hiển thị tours theo miền với phân trang
    public function showToursByDomain($domain, Request $request)
    {
        // Validate domain
        if (!in_array($domain, ['n', 'b', 't'])) {
            abort(404);
        }

        // Thiết lập phân trang
        $page = $request->get('page', 1);
        $perPage = 6; // Số tour mỗi trang (có thể điều chỉnh)
        $offset = ($page - 1) * $perPage;   

        // Lấy tours theo miền với phân trang
        $tours = $this->tours->filterTours(['domain' => $domain], null, $perPage, $offset);
        
        // Đếm tổng số tours theo miền
        $totalTours = $this->tours->countFilteredTours(['domain' => $domain]);
        $totalPages = ceil($totalTours / $perPage);
        
        // Định nghĩa title theo miền
        $domainNames = [
            'b' => 'Miền Bắc',
            't' => 'Miền Trung', 
            'n' => 'Miền Nam'
        ];
        
        $title = 'Tours ' . $domainNames[$domain];
        
        // Tạo thông tin phân trang
        $pagination = [
            'current_page' => $page,
            'total_pages' => $totalPages,
            'per_page' => $perPage,
            'total' => $totalTours,
            'has_more' => $page < $totalPages,
            'prev_page' => $page > 1 ? $page - 1 : null,
            'next_page' => $page < $totalPages ? $page + 1 : null
        ];
        
        return view('clients.tour_by_domain', compact('title', 'tours', 'domain', 'pagination'));
    }
}