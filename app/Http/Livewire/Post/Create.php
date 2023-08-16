<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;

class Create extends Component
{
    use WithFileUploads;

    public $title, $slug, $category_id, $contents, $is_published, $published_at, $user_id, $feature_image;

    public $is_draft = 0;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'title' => ['required', 'string', Rule::unique(Post::class)],
                'slug' => ['string', 'nullable'],
                'contents' => ['required', 'string'],
                'is_published' => ['boolean', 'nullable'],
                'is_draft' => ['boolean', 'nullable'],
                'published_at' => ['required', 'date'],
                'user_id' => ['exists:users,id', 'nullable'],
                'category_id' => ['exists:categories,id', 'nullable'],
                'feature_image' => ['required',
                    File::image()
                        ->types(['jpg', 'png', 'jpeg']),
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

    public function render()
    {
        $users = DB::table('users')->select('id', 'name')->get();
        $categories = DB::table('categories')->select('id', 'name')->orderBy('name', 'asc')->get();
        return view('livewire.post.create', compact('users', 'categories'));
    }
}
