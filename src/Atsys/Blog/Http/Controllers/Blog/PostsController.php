<?php

namespace Atsys\Blog\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Atsys\Blog\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('postCategories')->latest()->paginate(config('blog.pagination'));

        return view('blog::frontend.posts.index', compact('posts'));
    }

    public function show($category_slug, $post_slug)
    {
        $post = Post::where('alias->' . app()->getLocale(), $post_slug)
            ->whereHas('postCategories', function ($query) use ($category_slug) {
                $query->where('alias->' . app()->getLocale(), $category_slug);
            })
            ->first();

        if (!$post) {
            abort(404);
        }

        return view('blog::frontend.posts.show', compact('post'));
    }
}
