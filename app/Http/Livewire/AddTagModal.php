<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class AddTagModal extends ModalComponent
{
    public $name, $slug;

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', 'string', Rule::unique(Tag::class)],
                'slug' => ['string', 'nullable'],
            ],
        );
        Tag::create($validatedData);
        $this->emit('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.add-tag-modal');
    }
}
