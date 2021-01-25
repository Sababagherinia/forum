<?php
/**
 * Created by PhpStorm.
 * User: MJ-lp
 * Date: 2020-04-07
 * Time: 10:28 AM
 */

namespace App\Traits\Relations;


trait CommentRelationsTrait
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }


    public function commentable()
    {
        return $this->morphTo();
    }
}