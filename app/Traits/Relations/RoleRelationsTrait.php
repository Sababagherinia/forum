<?php
/**
 * Created by PhpStorm.
 * User: MJ-lp
 * Date: 2019-03-05
 * Time: 11:34 AM
 */

namespace App\Traits\Relations;


trait RoleRelationsTrait
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
}