<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class AddCategoryModal extends ModalComponent
{
    public $name, $slug;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', 'string', Rule::unique(Category::class)],
                'slug' => ['string', 'nullable'],
            ],
        );
        Category::create($validatedData);
        $this->emit('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.add-category-modal');
    }
}
