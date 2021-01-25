<?php

namespace App;

use App\Traits\Relations\PermissionRelationsTrait;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use PermissionRelationsTrait;
    protected $fillable = [
        'title',
        'label',
    ];


    public static function permissionFields()
    {
        return [

            "title" => [


                "article" => "تاپیک",

            ],
            "permission" => [
                "" => "",
                "-store" => " ایجاد",
                "-update" => " آپدیت",
                "-destroy" => " حذف",
            ]

        ];
    }

    public static function permissionCustomFields()
    {
        return [
            [
                "label" => "کامنت" ,
                "title" => "comment-update"
            ] ,
            [
                "label" => "کاربر" ,
                "title" => "user-update"
            ] ,


        ];
    }


    public function scopeSearch($query, $keyword)
    {

        $query->where('title', 'LIKE', '%' . $keyword . '%')->orWhere('label', 'LIKE', '%' . $keyword . '%');

        return $query;

    }


}
