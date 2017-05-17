<?php

namespace Atsys\Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post_category_id',
        'published',
        'title',
        'alias',
        'subtitle',
        'description',
        'short_description',
        'meta_description',
        'meta_title',
    ];

    protected $casts = [
        'published' => 'boolean',
        'title' => 'array',
        'alias' => 'array',
        'subtitle' => 'array',
        'description' => 'array',
        'short_description' => 'array',
        'meta_description' => 'array',
        'meta_title' => 'array',
    ];

    public function postCategory()
    {
        return $this->belongsTo('Atsys\Blog\PostCategory');
    }

    public function getTitleTranslatedAttribute()
    {
        return $this->title[app()->getLocale()];
    }

    public function getSubtitleTranslatedAttribute()
    {
        return $this->subtitle[app()->getLocale()];
    }

    public function getAliasTranslatedAttribute()
    {
        return $this->alias[app()->getLocale()];
    }

    public function getShortDescriptionTranslatedAttribute()
    {
        return $this->short_description[app()->getLocale()];
    }

    public function getDescriptionTranslatedAttribute()
    {
        return $this->description[app()->getLocale()];
    }

    public function getRouteAttribute()
    {
        return "{$this->postCategory->route}/{$this->alias_translated}";
    }
}
