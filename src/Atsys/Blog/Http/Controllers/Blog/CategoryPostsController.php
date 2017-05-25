<?php

namespace Atsys\Blog\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Atsys\Blog\PostCategory;

class CategoryPostsController extends Controller
{
    public function index($category_slug)
    {
        $category = PostCategory::where('alias->' . app()->getLocale(), $category_slug)->first();

        if (!$category) {
            abort(404);
        }

        $posts = $category->posts()->with('postCategories')->latest()->paginate(config('blog.pagination'));

        $page_title = $category->title_translated;

        return view('blog::frontend.posts.index', compact('posts', 'page_title'));
    }
}
