<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class ChatController extends Controller
{
    public function show($tourID)
    {
        $tour = Tour::find($tourID);
        return view('chat', compact('tourID', 'tour'));
    }
    public function selectAdmin()
    {
        $admins = \App\Models\Admin::select('adminID', 'username')->get();
        return view('selectAdmin', compact('admins'));
    }
}
