<?php

namespace Atsys\Blog\Http\ViewComposers;

use Atsys\Blog\PostCategory;
use Illuminate\View\View;

class CategoriesComposer
{
    /**
     * The post category model implementation.
     *
     * @var PostCategory
     */
    protected $postCategory;

    /**
     * Create a new post categories composer.
     *
     * @param  PostCategory  $postCategory
     * @return void
     */
    public function __construct(PostCategory $postCategory)
    {
        $this->postCategory = $postCategory;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = $this->postCategory->has('posts')
            ->withCount('posts')
            ->latest()
            ->get()
            ->sortBy('title_translated');

        $view->with('categories', $categories);
    }
}
