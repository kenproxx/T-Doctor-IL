<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * @var \Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
    public mixed $medical_history;
    /**
     * @var \Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
    public mixed $nation_id;
    /**
     * @var \Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
    public mixed $province_id;
    /**
     * @var \Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
    public mixed $district_id;
    /**
     * @var \Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
    public mixed $commune_id;
    /**
     * @var \Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
    public mixed $gender;
    /**
     * @var \Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
    public mixed $birthday;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password','medical_history','nation_id','province_id','district_id',
        'username', 'phone', 'address_code', 'status', 'type',
        'provider_id', 'provider_name', 'prescription', 'free', 'abouts', 'abouts_en', 'abouts_lao', 'workspace',
        'last_seen','commune_id','gender','birthday'
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

    public static function isExistPhone($phone)
    {
        $user = User::where('phone', $phone)->first();
        if ($user) {
            return true;
        }
        return false;
    }

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
        return $user->avt;
    }

    //get member name by id

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id');
    }

    //get email by id

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    //get avt by id

    public function getJWTCustomClaims()
    {
        return [];
    }

}
