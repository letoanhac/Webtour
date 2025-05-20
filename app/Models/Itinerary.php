<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $table = 'itinerary';
    protected $primaryKey = 'itineraryID';
    public $timestamps = false;

    protected $fillable = [
        'itineraryID',
        'tourID',
        'day',
        'title',
        'description',
        'information'
    ];
    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tourID', 'tourID');
    }
}