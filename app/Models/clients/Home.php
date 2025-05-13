<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    protected $table = 'tour';
    public function getHomeTour()
    {
        $tours = DB::table($this->table)
            ->get();
        foreach ($tours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('images')
                ->where('tourID', $tour->tourID)
                ->pluck('imageURL');
        }
        return $tours;
    }
}
