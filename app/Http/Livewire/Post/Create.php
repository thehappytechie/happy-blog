<?php

namespace App\Http\Livewire\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;


class Create extends Component
{
    use WithFileUploads;

    public $title, $slug, $category_id, $contents, $is_published, $is_draft, $published_at, $user_id, $feature_image, $users;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'title' => ['required', 'string'],
                'slug' => ['nullable'],
                'contents' => ['nullable'],
                'is_published' => ['nullable'],
                'is_draft' => ['nullable'],
                'published_at' => ['required', 'date'],
                'user_id' => ['required', 'exists:users,id'],
                'category_id' => ['required', 'exists:categories,id'],
                'feature_image' => ['required'],
            ],
        );
        if ($this->feature_image instanceof \Livewire\TemporaryUploadedFile) {
            $validatedData['feature_image'] = $this->feature_image->store('photos', 'public');
        }
        Post::create($validatedData);
        session()->flash('success', 'Post added successfully.');
        return redirect()->route('dashboard');
    }

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.post.create', compact('categories'));
    }
}
