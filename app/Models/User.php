<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
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
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'activation_token',
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
    public function getUserId($username) {
        return DB::table($this->table)
        ->select('userID')
        ->where('username', $username)
        ->value('userID');
    }
    public function getUser($id) {
        $users = DB::table($this->table)
        ->where('userID', $id)
        ->first();
        return $users;
    }

     public function updateUser($id, $data)
    {
        $update = DB::table($this->table)
            ->where('userID', $id)
            ->update($data);

        return $update;
    }
}
