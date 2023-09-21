<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserPost extends Component
{
    public function render()
    {
        $posts = Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.post.user-post', compact('posts'));
    }
}
