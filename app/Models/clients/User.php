<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table = 'user';

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
