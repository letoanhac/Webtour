<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class TourListController extends Controller
{
    private $tours;

    public function __construct()
    {
        $this->tours = new Tour();
    }

    public function index()
    {
        $title = "Danh sách Tour";
        $tours = $this->tours->getAllTours();
        return view('User.Tour_List', compact('title', 'tours'));
    }

    public function create() { /* ... */ }
    public function store(Request $request) { /* ... */ }
    public function show(string $id) { /* ... */ }
    public function edit(string $id) { /* ... */ }
    public function update(Request $request, string $id) { /* ... */ }
    public function destroy(string $id) { /* ... */ }
}
