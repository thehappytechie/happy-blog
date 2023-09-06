<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class Articles extends Component
{
    public function render()
    {
        return view('livewire.post.articles')
            ->layout('layouts.public');
    }
}
