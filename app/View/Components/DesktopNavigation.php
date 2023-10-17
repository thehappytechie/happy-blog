<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use App\Models\Post;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class DesktopNavigation extends Component
{
    private $post;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $posts = Post::all();
        return view('components.public.desktop-navigation', ['posts' => $posts]);
    }
}
