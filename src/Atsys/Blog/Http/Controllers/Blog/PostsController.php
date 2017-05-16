<?php

namespace Atsys\Blog\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Atsys\Blog\Post;
use Atsys\Blog\PostCategory;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('postCategory')->latest()->paginate(10);

        $latest_posts = Post::latest()->take(5);

        $categories = PostCategory::has('posts')->latest()->get()->sortBy('title_translated');

        return view('blog::frontend.posts.index', compact('post', 'latest_posts', 'categories'));
    }
}
