<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;

class Edit extends Component
{
    use WithFileUploads;

    public $post, $category_id, $title, $slug, $contents, $is_published, $is_draft, $published_at, $user_id, $feature_image;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->category_id = $post->category_id;
        $this->user_id = $post->user_id;
        $this->is_draft = $post->is_draft;
        $this->published_at = $post->published_at;
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'title' => ['required', Rule::unique(Post::class)->ignore($this->post)],
                'slug' => ['string', 'nullable'],
                'contents' => ['nullable'],
                'is_published' => ['boolean', 'nullable'],
                'is_draft' => ['boolean', 'nullable'],
                'published_at' => ['nullable', 'date'],
                'user_id' => ['required', 'exists:users,id'],
                'category_id' => ['required', 'exists:categories,id'],
                'feature_image' => [
                    File::image()
                        ->types(['jpg', 'png', 'jpeg']), 'nullable',
                ],
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
        $users = DB::table('users')->select('id', 'name')->get();
        $categories = DB::table('categories')->select('id', 'name')->orderBy('name', 'asc')->get();
        return view('livewire.post.edit', compact('users', 'categories'));
    }
}
