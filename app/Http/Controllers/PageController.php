<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $categories = Category::get(['id', 'name']);
        return view('pages.home', compact('categories'));
    }
}
