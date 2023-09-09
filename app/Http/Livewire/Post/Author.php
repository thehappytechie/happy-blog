<?php

namespace App\Http\Livewire\Post;

use App\Models\User;
use Livewire\Component;

class Author extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.post.author')
            ->layout('layouts.public');
    }
}
