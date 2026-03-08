<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Tours;
use Illuminate\Http\Request;

class TourListController extends Controller
{
    private $tours;

    public function __construct()
    {
        $this->tours = new Tours();
    }
    
    public function index(Request $request)
    {
        $title = "Danh sách Tour";
        $page = $request->get('page', 1);
        $perPage = 4; // Số tour mỗi trang
        $offset = ($page - 1) * $perPage;
        
        // Lấy tours với phân trang
        $tours = $this->tours->filterTours([], null, $perPage, $offset);
        
        // Đếm tổng số tours
        $totalTours = $this->tours->countFilteredTours([]);
        $totalPages = ceil($totalTours / $perPage);
        
        $domain = $this->tours->getDomain();
        $domainsCount = [
            'mien_bac' => optional($domain->firstWhere('domain', 'b'))->count,
            'mien_trung' => optional($domain->firstWhere('domain', 't'))->count,
            'mien_nam' => optional($domain->firstWhere('domain', 'n'))->count,
        ];
        
        $pagination = [
            'current_page' => $page,
            'total_pages' => $totalPages,
            'per_page' => $perPage,
            'total' => $totalTours,
            'has_more' => $page < $totalPages,
            'prev_page' => $page > 1 ? $page - 1 : null,
            'next_page' => $page < $totalPages ? $page + 1 : null
        ];
        
        return view('clients.tourList', compact('title', 'tours', 'domainsCount', 'totalTours', 'pagination'));
    }

    public function filterTours(Request $req)
    {
        $conditions = [];
        $sorting = [];
        $page = $req->get('page', 1);
        $perPage = 4;
        $offset = ($page - 1) * $perPage;

         // Handle domain filter
        if ($req->filled('domain')) {
            $domain = $req->domain;
            $conditions[] = ['domain', '=', $domain];
        }

        // Handle star rating filter
        if ($req->filled('star')) {
            $star = (int) $req->star;
            $conditions[] = ['averageRating', '=', $star];
        }

        // Handle duration filter
        if ($req->filled('time')) {
            $duration = $req->time;
            $time = [
                '3n2d' => '3 ngày 2 đêm',
                '4n3d' => '4 ngày 3 đêm',
                '5n4d' => '5 ngày 4 đêm'
            ];
            $conditions[] = ['time', '=', $time[$duration]];
        }

        // Handle order filter
        if ($req->filled('sorting')) {
            $sortingOption = trim($req->sorting); 
           
            if ($sortingOption == 'new') {
                $sorting = ['tourID', 'desc']; // Sort by creation date, newest first
            } elseif ($sortingOption == 'old') {
                $sorting = ['tourID', 'asc']; // Sort by creation date, oldest first
            } elseif ($sortingOption == "hight-to-low") {
                $sorting = ['priceAdult', 'desc']; // Sort by price in descending order
            } elseif ($sortingOption == "low-to-high") {
                $sorting = ['priceAdult', 'asc']; // Sort by price in ascending order
            }
        }
        
        // Handle price filter
        if ($req->filled('minPrice') && $req->filled('maxPrice')) {
            $minPrice = $req->minPrice;
            $maxPrice = $req->maxPrice;
            $conditions[] = ['priceAdult', '>=', $minPrice];
            $conditions[] = ['priceAdult', '<=', $maxPrice];
        }

        // Lấy tours với điều kiện filter và phân trang
        $tours = $this->tours->filterTours($conditions, $sorting, $perPage, $offset);
        
        // Đếm tổng số tours với điều kiện filter
        $totalTours = $this->tours->countFilteredTours($conditions);
        $totalPages = ceil($totalTours / $perPage);
        
        $pagination = [
            'current_page' => $page,
            'total_pages' => $totalPages,
            'per_page' => $perPage,
            'total' => $totalTours,
            'has_more' => $page < $totalPages,
            'prev_page' => $page > 1 ? $page - 1 : null,
            'next_page' => $page < $totalPages ? $page + 1 : null
        ];
        
        return view('clients.partials.filter-tour', compact('tours', 'pagination'));
    }
}