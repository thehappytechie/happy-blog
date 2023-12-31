<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Show extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function incrementViewCount()
    {
        $this->post->increment('views');
        $this->post->refresh();
    }

    public function render()
    {
        return view('livewire.post.show');
    }
}
