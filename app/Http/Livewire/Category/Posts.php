<?php

namespace App\Http\Livewire\Category;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;

class Posts extends Component
{
    public $post, $posts, $category;

    public function mount(Post $post,Category $category)
    {
        $this->post = $post;
        $this->posts = Post::all();
        $this->category = $category;

    }

    public function incrementViewCount($postId)
    {
        $post = Post::find($postId);
        if ($post) {
            $post->increment('views');
        }
    }

    public function render()
    {
        return view('livewire.category.posts')
        ->layout('layouts.public');
    }
}
