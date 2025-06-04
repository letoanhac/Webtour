<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';
    protected $primaryKey = 'chatID';
    public $timestamps = false;

    protected $fillable = [
        'chatName',
        'userID',
        'adminID',
        'messages',
        'readStatus',
        'createdDate',
        'ipAddress',
    ];
}

