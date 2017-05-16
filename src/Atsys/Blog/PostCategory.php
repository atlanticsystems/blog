<?php

namespace Atsys\Blog;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = [
        'title',
        'alias',
    ];

    protected $casts = [
        'title' => 'array',
        'alias' => 'array',
    ];

    public function posts()
    {
        return $this->hasMany('Atsys\Blog\Post');
    }

    public function getTitleTranslatedAttribute()
    {
        return $this->title[app()->getLocale()];
    }

    public function getAliasTranslatedAttribute()
    {
        return $this->alias[app()->getLocale()];
    }

    public function getRouteAttribute()
    {
        return $this->alias_translated;
    }
}
