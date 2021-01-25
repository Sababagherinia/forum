<?php
/**
 * Created by PhpStorm.
 * User: Mj-DSK
 * Date: 2020-07-15
 * Time: 2:59 PM
 */

namespace App\Traits\Relations;


trait VoteRelationsTrait
{
    public function user()
    {
        return $this->belongsTo("App\User");
    }
    public function comment()
    {
        return $this->belongsTo("App\Comment");
    }
}
