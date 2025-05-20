<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tours extends Model
{
    protected $table = 'tour';
    public function getAllTours()
    {

        $allTours = DB::table($this->table)->get();
        foreach ($allTours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('images')
                ->where('tourID', $tour->tourID)
                ->pluck('imageURL');
        }
        return $allTours;
    }

    //Lấy khu vực đến b-t-n
    public function getDomain()
    {
        return DB::table($this->table)
            ->select('domain', DB::raw('COUNT(*) as count'))
            ->whereIn('domain', ['b', 't', 'n'])
            ->groupBy('domain')
            ->get();
    }

    public function filterTours($filters = [], $sorting = null, $perPage = null)
    {
        DB::enableQueryLog();
        $getTours = DB::table($this->table);
        if (!empty($filters)) {
            $getTours = $getTours->where($filters);
        }

       if (!empty($sorting) && isset($sorting[0]) && isset($sorting[1])) {
    $column = $sorting[0];
    $direction = strtolower($sorting[1]);

    // Đảm bảo direction hợp lệ
    if (!in_array($direction, ['asc', 'desc'])) {
        $direction = 'asc';
    }

    $getTours = $getTours->orderBy($column, $direction);
}
        $tours = $getTours->get();
        $querylog = DB::getQueryLog();

        foreach ($tours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('images')
                ->where('tourID', $tour->tourID)
                ->pluck('imageURL');
        }
        return $tours;
    }
}
