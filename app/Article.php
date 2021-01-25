<?php

namespace App;


use App\Traits\Relations\ArticleRelationsTrait;
use App\Traits\SlugTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    private static $modelName = "App\Article";

    use ArticleRelationsTrait;
    use SoftDeletes;
    use SlugTrait;


    protected $fillable = [

        'slug',
        'title',
        'body',
        'confirmed',
        'closed',
        'user_id',

    ];


    public function scopePublished($query)
    {
        $query->where('confirmed' , true);
        return $query;
    }




    public function scopeSearch($query, $keyword)
    {
        $query->where('title', 'LIKE', '%' . $keyword . '%');
        return $query;
    }



    public function getHrefUrlAttribute()
    {

        return route("website.article.show" , ["article" => $this->slug ]);
    }


}
