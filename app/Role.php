<?php

namespace App;

use App\Traits\Relations\RoleRelationsTrait;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use RoleRelationsTrait;
    protected $fillable = [
        'title',
        'label',
    ];


    public function scopeSearch($query, $keyword)
    {

        $query->where('title', 'LIKE', '%' . $keyword . '%')->orWhere('label', 'LIKE', '%' . $keyword . '%');

        return $query;

    }


}
