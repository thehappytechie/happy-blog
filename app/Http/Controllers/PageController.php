<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $categories = Category::get(['id', 'name']);
        $posts = Post::latest()->take(6)->get();
        $popularFeaturedPost = Post::orderBy('views', 'desc')->first();
        $featuredPosts = Post::orderBy('views', 'desc')->skip(1)->take(2)->get();
        return view('pages.home', compact('categories', 'posts', 'popularFeaturedPost','featuredPosts'));
    }
}
