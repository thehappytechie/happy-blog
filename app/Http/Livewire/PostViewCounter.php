<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostViewCounter extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = Post::findOrFail($post->id);
    }

    public function incrementViews()
    {
        $this->post->increment('views');
    }

    public function render()
    {
        return view('livewire.post-view-counter');
    }
}
