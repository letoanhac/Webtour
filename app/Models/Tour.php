<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'availability',
        'itinerary'
    ];
    public function images()
    {
        return $this->hasMany(\App\Models\Image::class, 'tourID', 'tourID');
    }
}
