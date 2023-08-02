<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;


class Create extends Component
{
    use WithFileUploads;

    public $title, $slug, $contents, $is_published, $is_draft, $published_at, $user_id, $feature_image;

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
                'published_at' => ['date', 'nullable'],
                'user_id' => ['string', 'nullable'],
                // 'feature_image' => [
                //     'nullable',
                //     File::image(),
                // ],
            ],
        );
        if ($this->feature_image instanceof \Livewire\TemporaryUploadedFile) {
            $validatedData['feature_image'] = $this->feature_image->store('photos', 'public');
        }
        // dd($this->feature_image);
        Post::create($validatedData);
        session()->flash('success', 'Post added successfully.');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.post.create');
    }
}
