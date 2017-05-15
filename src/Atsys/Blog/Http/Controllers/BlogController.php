<?php
namespace Atsys\Blog\Http\Controllers;

use App\Http\Controllers\Controller;

class BlogController extends Controller
{

    public function index()
    {
		return view('blog.frontend.blog');
    }

}