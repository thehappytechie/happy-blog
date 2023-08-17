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

class Edit extends Component
{
    use WithFileUploads;

    public $post, $category_id, $title, $slug, $contents, $is_archived, $is_draft, $published_at, $user_id, $feature_image;

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
        $this->contents = $post->contents;
        $this->published_at = $post->published_at;
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'title' => ['required', Rule::unique(Post::class)->ignore($this->post)],
                'slug' => ['required', 'string'],
                'contents' => ['required', 'string'],
                'is_draft' => ['boolean', 'nullable'],
                'published_at' => ['required', 'date'],
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

    public function draft()
    {
        $this->post->update(['is_draft' => 0]);
        return redirect()->route('dashboard');
    }

    public function archive()
    {
        $this->post->update([
            'is_archived' => !$this->post->is_archived
        ]);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        $users = User::select('id', 'name')->get();
        $categories = Category::select('id', 'name')->orderBy('name', 'asc')->get();
        return view('livewire.post.edit', compact('users', 'categories'));
    }
}
