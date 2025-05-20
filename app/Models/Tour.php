<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tour extends Model
{
    use HasFactory;
    protected $table = 'tour';

    protected $primaryKey = 'tourID';
    
    public $timestamps = false;

    protected $fillable = [
        'tourID',
        'title',
        'description',
        'quantity',
        'priceAdult',
        'priceChild',
        'duration',
        'destination',
        'availability'
    ];
    public function getAllTours() {
        $allTours = DB::table($this->table)->get();
        foreach ($allTours as $tour) {
            // Lấy danh sách hình ảnh thuộc về tour
            $tour->images = DB::table('images')
                ->where('tourID', $tour->tourID)
                ->pluck('imageURL');
        }
        return $allTours; 
    }
    public function images()
    {
        return $this->hasMany(\App\Models\Image::class, 'tourID', 'tourID');
    }
    public function firstImage()
    {
        return $this->hasOne(Image::class, 'tourID', 'tourID')->orderBy('uploadDate', 'asc');
    }
}
