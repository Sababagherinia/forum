<?php
/**
 * Created by PhpStorm.
 * User: MJ-lp
 * Date: 2019-03-05
 * Time: 11:34 AM
 */

namespace App\Traits\Relations;


trait ArticleRelationsTrait
{


    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}