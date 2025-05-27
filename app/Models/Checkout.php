<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'checkout';
    protected $primaryKey = 'checkoutID';
    public $timestamps = false;

    protected $fillable = [
        'bookingID',
        'paymentMethod',
        'paymentDate',
        'paymentStatus',
        'transactionID'
    ];
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'bookingID', 'bookingID');
    }
}
