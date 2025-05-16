<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';
    protected $primaryKey = 'historyID';

    protected $fillable = [
        'historyID',
        'userID',
        'tourID',
        'actionType',
        'timestamp'
    ];
}
