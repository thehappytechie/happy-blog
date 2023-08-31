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
        $slug = Str::slug($this->title);
        $count = Post::where('slug', 'like', "%{$slug}%")->count();

        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }
        $this->slug = $slug;
    }

    public function mount(Post $post)
    {
        $this->post = $post;

        $fields = ['title', 'slug', 'category_id', 'user_id', 'is_draft', 'contents', 'published_at'];

        foreach ($fields as $field) {
            $this->{$field} = $post->{$field};
        }
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
            ],
        );
        if ($this->feature_image instanceof \Livewire\TemporaryUploadedFile) {
            $validatedData['feature_image'] = $this->feature_image->store('photos', 'public');
        }
        $this->post->update($validatedData);
        return redirect()->route('dashboard');
    }

    public function publishDraft()
    {
        $this->post->update(['is_draft' => 0]);
        session()->flash('success', 'Post published successfully.');
        return redirect()->route('post.index');
    }

    public function publishArchive()
    {
        $this->post->update([
            'is_archived' => !$this->post->is_archived
        ]);
        session()->flash('success', 'Post updated successfully.');
        return redirect()->route('post.index');
    }

    public function render()
    {
        $users = User::select('id', 'name')->get();
        $categories = Category::select('id', 'name')->orderBy('name', 'asc')->get();
        return view('livewire.post.edit', compact('users', 'categories'));
    }
}
