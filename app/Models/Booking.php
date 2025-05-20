<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'bookingID';
    public $timestamps = false;

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tourID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
    public function checkout()
    {
        return $this->hasOne(Checkout::class, 'bookingID', 'bookingID');
    }
    }

?>