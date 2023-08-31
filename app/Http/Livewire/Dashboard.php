<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Dashboard extends Component
{
    public $postCount;
    public $draftCount;
    public $publishedCount;
    public $archivedCount;

    public function mount()
    {
        $this->postCount = Post::count();
        $this->draftCount = Post::where('is_draft', 1)->count();
        $this->publishedCount = Post::where('is_draft', '!=', 1)
            ->where('is_archived', '=', 0)
            ->count();
        $this->archivedCount = Post::where('is_archived', '=', 1)->count();
    }

    public function render()
    {
        $posts = Post::with('user', 'category')->get();
        return view('livewire.dashboard', compact('posts'));
    }
}
