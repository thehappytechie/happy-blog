<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class Create extends Component
{
    use WithFileUploads;

    public $title, $slug, $category_id, $contents, $is_published, $published_at, $user_id, $feature_image, $users;

    public $is_draft = "";

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
                'user_id' => ['exists:users,id', 'nullable'],
                'category_id' => ['exists:categories,id', 'nullable'],
                'feature_image' => [
                    File::image()
                        ->types(['jpg', 'png', 'jpeg']), 'nullable',
                ],
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
