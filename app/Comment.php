<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Relations\CommentRelationsTrait;

class Comment extends Model
{
    private static $modelName = "App\Comment";

    use CommentRelationsTrait;
    use SoftDeletes;


    protected $fillable = [
        'body',
        'confirmed',
        'user_id',
        'comment_id',

    ];

    public function scopePublished($query)
    {
        $query->where("confirmed" , true);
        return $query;
    }

    public function getLikeCountAttribute()
    {
        return $this->votes()->where("like" , true)->count();
    }


    public function getDislikeCountAttribute()
    {
        return $this->votes()->where("dislike" , true)->count();
    }

}
