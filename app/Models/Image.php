<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $primaryKey = 'imageID'; 

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'tourID', 
        'imageURL', 
        'description', 
        'uploadDate'
    ];
    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tourID', 'tourID');
    }
}
