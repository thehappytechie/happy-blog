<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.post.about')
            ->layout('layouts.public');
    }
}
