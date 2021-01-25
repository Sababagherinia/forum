<?php
/**
 * Created by PhpStorm.
 * User: MJ-lp
 * Date: 2019-03-05
 * Time: 11:34 AM
 */

namespace App\Traits\Relations;


trait PermissionRelationsTrait
{
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}