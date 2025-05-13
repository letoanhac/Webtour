<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $table = 'tour';

    protected $primaryKey = 'tourID';

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
}
