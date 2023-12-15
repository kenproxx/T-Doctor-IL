<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable  implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password',
        'username', 'phone', 'address_code', 'status','type',
        'provider_id', 'provider_name', 'prescription', 'free', 'abouts', 'abouts_en', 'abouts_lao', 'workspace'
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

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function getNameByID($id)
    {
        if (!$id) {
            return '';
        }

        $user = User::where('id', $id)->first();

        if (!$user) {
            return '';
        }

        if (!$user->name && !$user->last_name) {
            return 'No name';
        }

        if (!$user->name) {
            $user->name = '';
        }
        if (!$user->last_name) {
            $user->last_name = '';
        }

        return $user->name . ' ' . $user->last_name;
    }

    public static function isExistUsername($username)
    {
        $user = User::where('username', $username)->first();
        if ($user) {
            return true;
        }
        return false;
    }

    public static function isExistEmail($email)
    {
        $user = User::where('email', $email)->first();
        if ($user) {
            return true;
        }
        return false;
    }

    //get member name by id
    public static function getMemberNameByID($id)
    {
        if (!$id) {
            return '';
        }
        $user = User::where('id', $id)->first();
        if (!$user) {
            return '';
        }
        $role = RoleUser::where('user_id', $id)->first();
        if (!$role) {
            return '';
        }
        return Role::where('id', $role->role_id)->first()->name;
    }

    //get email by id
    public static function getEmailByID($id)
    {
        if (!$id) {
            return '';
        }
        $user = User::where('id', $id)->first();
        if (!$user) {
            return '';
        }
        return $user->email ?? 'noemail@gmail.com';
    }

    //get avt by id
    public static function getAvtByID($id)
    {
        if (!$id) {
            return '';
        }
        $user = User::where('id', $id)->first();
        if (!$user) {
            return '';
        }

        if (!$user->avt) {
            return '/img/user-circle.png';
        }
        return $user->avt ;
    }

}
