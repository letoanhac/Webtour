<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';
    protected $primaryKey = 'historyID';
    public $timestamps = false;

    protected $fillable = [
        'historyID',
        'bookingID',
        'userID',
        'tourID',
        'actionType',
        'timestamp'
    ];
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'bookingID', 'bookingID');
    }
}
