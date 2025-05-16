<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'userID';
    public $timestamps = false;
    protected $fillable = [
        'userID',
        'username',
        'password',
        'email',
        'phoneNumber',
        'ipAddress',
        'status',
        'createDate',
        'updateDate'
    ];
}
