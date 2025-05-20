<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'userID';
    public $timestamps = false; 

    protected $fillable = [
        'google_id',
        'fullName',
        'username',
        'password',
        'email',
        'phoneNumber',
        'address',
        'ipAddress',
        'isActive',
        'createDate',
        'updateDate',
        'activation_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'activation_token', // nếu không muốn serialize token
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'isActive' => 'boolean',
            'createDate' => 'datetime',
            'updateDate' => 'datetime',
        ];
    }
}
