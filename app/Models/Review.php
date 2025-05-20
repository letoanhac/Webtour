<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    protected $primaryKey = 'reviewID';

    protected $fillable = [
        'reviewID',
        'tourID',
        'userID',
        'rating',
        'comment',
        'timestamp'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'userID','userID');
    }
    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tourID','tourID');
    }
}
