<?php
/**
 * Created by PhpStorm.
 * User: MJ-lp
 * Date: 2019-02-25
 * Time: 5:40 PM
 */

namespace App\Traits;


use Cviebrock\EloquentSluggable\Sluggable;

trait SlugTrait
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}