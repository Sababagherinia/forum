<?php
/**
 * Created by PhpStorm.
 * User: MJ-lp
 * Date: 2019-03-05
 * Time: 11:34 AM
 */

namespace App\Traits\Relations;


trait UserRelationsTrait
{



    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
 


}