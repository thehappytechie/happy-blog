<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class EditCategoryModal extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public $category, $name;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', Rule::unique(Category::class)->ignore($this->category)],
            ],
        );
        $this->category->update($validatedData);
        $this->emit('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.edit-category-modal');
    }
}
