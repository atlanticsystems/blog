<?php

namespace Atsys\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Post extends Model
{
    protected $fillable = [
        'published',
        'title',
        'alias',
        'subtitle',
        'description',
        'short_description',
        'meta_description',
        'meta_title',
        'image',
        'thumb',
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

    public function postCategories()
    {
        return $this->belongsToMany('Atsys\Blog\PostCategory');
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

    public function getMetaTitleTranslatedAttribute()
    {
        return $this->meta_title[app()->getLocale()];
    }

    public function getMetaDescriptionTranslatedAttribute()
    {
        return $this->meta_description[app()->getLocale()];
    }

    public function getRouteAttribute()
    {
        return $this->postCategories->first()->route . '/' . $this->alias_translated;
    }

    public function updateImage($file)
    {
        $this->deleteImageFile();

        $image = 'images/blog_posts/' . str_random(15) . '.' . $file->getClientOriginalExtension();
        $path = public_path($image);

        Image::make($file->path())->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path, 70);

        $thumb = 'images/blog_posts/' . str_random(15) . '.' . $file->getClientOriginalExtension();
        $path = public_path($thumb);

        Image::make($file->path())->fit(64, 64)->save($path, 70);

        $this->image = "/$image";
        $this->thumb = "/$thumb";
        $this->save();
    }

    /**
     * Delete the image file if exists.
     *
     * @return void
     */
    private function deleteImageFile()
    {
        if ($this->image && File::exists(public_path($this->image))) {
            File::delete(public_path($this->image));
        }
    }
}
