<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Relations\VoteRelationsTrait;

class Vote extends Model
{
    private static $modelName = "App\Vote";
    use SoftDeletes;
    use VoteRelationsTrait;
    protected $fillable = [
        'like',
        'dislike',
        'user_id',
        'comment_id',

    ];



}
