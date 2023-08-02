<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class Edit extends Component
{
    use WithFileUploads;

    public $post, $title, $slug, $contents, $is_published, $is_draft, $published_at, $user_id, $feature_image;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->feature_image = $post->feature_image;
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
                'published_at' => ['nullable'],
                'user_id' => ['string', 'nullable'],
            ],
        );
        if ($this->feature_image instanceof \Livewire\TemporaryUploadedFile) {
            $validatedData['feature_image'] = $this->feature_image->store('photos', 'public');
        }
        $this->post->update($validatedData);
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.post.edit');
    }
}
