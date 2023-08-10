<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Show extends Component
{
    public $post;
    public $title;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
    }

    public function render()
    {
        return view('livewire.post.show');
    }
}
