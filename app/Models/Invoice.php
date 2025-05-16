<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';
    protected $primaryKey = 'invoiceID';
    public $timestamps = false;

    protected $fillable = [
        'invoiceID',
        'bookingID',
        'amount',
        'dateIssued',
        'details'
    ];
}
