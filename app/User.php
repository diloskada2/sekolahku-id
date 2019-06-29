<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_as', 'super_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Get All User
    static function listData() {
        $sql = "SELECT u.id, u.name, u.email, u.user_as, u.super_user, u.created_at, u.updated_at FROM users AS u";
        $data = \DB::select($sql);

        return $data;
    }

    // Get User By ID
    static function getById($id) {
        $sql = "SELECT u.id, u.name, u.email, u.user_as, u.super_user, u.created_at, u.updated_at FROM users AS u WHERE u.id = $id";
        $data = \DB::select($sql);

        return $data[0];
    }
}
