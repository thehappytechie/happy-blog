<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public $post, $posts;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->posts = Post::all();
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
        return view('livewire.home')
        ->layout('layouts.public');
    }
}
