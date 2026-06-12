<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Tours;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    private $tours;

    public function __construct()
    {
        $this->tours = new Tours();
    }
    
    public function index(Request $request)
    {
        $title = 'Tìm kiếm';

        $destination = $request->input('destination');
        $inDate = $request->input('in_date');
        $endDate = $request->input('end_date');
        $keyword = $request->input('keyword'); 

        // Chuyển đổi định dạng ngày tháng
        $formattedInDate = $inDate ? Carbon::createFromFormat('d/m/Y', $inDate)->format('Y-m-d') : null;
        $formattedEndDate = $endDate ? Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d') : null;

        $dataSearch = [
            'destination' => $destination,
            'inDate' => $formattedInDate,
            'endDate' => $formattedEndDate,
            'keyword' => $keyword, 
        ];

        $tours = $this->tours->searchTours($dataSearch);

        // dd($tours);

        return view('clients.search_index', compact('title', 'tours'));
    }
}