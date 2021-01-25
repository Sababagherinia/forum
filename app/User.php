<?php

namespace App;

use App\Traits\Relations\UserRelationsTrait;
use App\Traits\SlugTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use UserRelationsTrait;
    use Notifiable;
    use SoftDeletes;
    //---------
    use SlugTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'slug',
        'username',
        'password',
        'type',
        'name',
        'blocked',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];


    public static function getUserType()
    {
        return [

            "user" => "کاربر",
            "admin" => "ادمین",
            "super-admin" => "سوپر ادمین",
        ];
    }

    public function getUserTypeAttribute()
    {
        if (isset($this->getUserType()[$this->type]))
            return $this->getUserType()[$this->type];
        else
            return null;
    }

    public function accessDashboard()
    {
        if ($this->type == "super-admin" || $this->type == "admin")
            return true;
        return false;
    }

    public function isSuperAdmin()
    {
        return $this->type == "super-admin" ? true : false;
    }

    public function hasRole($roles)
    {
        if (is_string($roles))
            return $this->roles->contains('title', $roles);

        foreach ($roles as $role)
            if ($this->hasRole($role->title) == true)
                return true;

        return false;
    }


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'username'
            ]
        ];
    }

    public function scopeSearch($query, $keyword)
    {

        $query
            ->where('username', 'LIKE', '%' . $keyword . '%')
            ->orWhere('name', 'LIKE', '%' . $keyword . '%');

        return $query;

    }



}
