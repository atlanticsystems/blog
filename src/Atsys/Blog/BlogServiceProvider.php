<?php

namespace Atsys\Blog;

use Atsys\Blog\Http\ViewComposers\CategoriesComposer;
use Atsys\Blog\Http\ViewComposers\LatestPostsComposer;
use Atsys\Blog\Post;
use Atsys\Blog\PostCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish package files
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'blog');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'blog');

        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/blog'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../../config/blog.php' => config_path('blog.php'),
        ]);

        // Add route model binding
        Route::model('post', Post::class);
        Route::model('post_category', PostCategory::class);

        // Load view composers
        View::composer('blog::frontend.categories', CategoriesComposer::class);
        View::composer('blog::frontend.latest_posts', LatestPostsComposer::class);

        // Load the package dependencies's service providers
        $this->app->register(\Intervention\Image\ImageServiceProvider::class);
    }

    /**
    * Register the application services.
    *
    * @return void
    */
    public function register()
    {
        //
    }
}
