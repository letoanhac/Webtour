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

    public function filterTours($filters = [], $sorting = null, $limit = null, $offset = null)
    {
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


        //limit xác định số lượng bản ghi tối đa được trả về cho mỗi trang.
        //offset xác định bản ghi bắt đầu từ đâu để lấy dữ liệu.
        // Thêm limit và offset nếu có
        if ($offset !== null) {
            $getTours = $getTours->offset($offset);
        }
        
        if ($limit !== null) {
            $getTours = $getTours->limit($limit);
        }

        $tours = $getTours->get();

        foreach ($tours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('images')
                ->where('tourID', $tour->tourID)
                ->pluck('imageURL');
        }
        
        return $tours;
    }

    // Thêm method để đếm số tours với điều kiện filter
    public function countFilteredTours($filters = [])
    {
        $query = DB::table($this->table);
        
        if (!empty($filters)) {
            $query = $query->where($filters);
        }
        
        return $query->count();
    }

    public function searchTours($data)
    {
        $tours = DB::table($this->table);

        // Thêm điều kiện cho destination với LIKE
        if (!empty($data['destination'])) {
            $tours->where('destination', 'LIKE', '%' . $data['destination'] . '%');
        }

        // Thêm điều kiện cho startDate và endDate nếu cần so sánh
        if (!empty($data['startDate'])) {
            $tours->whereDate('startDate', '>=', $data['startDate']);
        }
        if (!empty($data['endDate'])) {
            $tours->whereDate('endDate', '<=', $data['endDate']);
        }

       
        if (!empty($data['keyword'])) {
            $tours->where(function ($query) use ($data) {
                $query->where('destination', 'LIKE', '%' . $data['keyword'] . '%');
            });
        }

        $tours = $tours->where('availability', 1);
        $tours = $tours->limit(12)->get();

        foreach ($tours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('images')
                ->where('tourID', $tour->tourID)
                ->pluck('imageURL');
        }
        return $tours;
    }
}