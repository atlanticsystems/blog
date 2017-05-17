<?php

namespace Atsys\Blog\Http\ViewComposers;

use Atsys\Blog\Post;
use Illuminate\View\View;

class LatestPostsComposer
{
    /**
     * The post model implementation.
     *
     * @var Post
     */
    protected $post;

    /**
     * Create a new post composer.
     *
     * @param  Post  $post
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $latest_posts = $this->post->latest()->take(5)->get();

        $view->with('latest_posts', $latest_posts);
    }
}
