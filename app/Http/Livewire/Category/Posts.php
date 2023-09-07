<?php

namespace App\Http\Livewire\Category;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;

class Posts extends Component
{
    public $category;

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.category.posts')
        ->layout('layouts.public');
    }
}
