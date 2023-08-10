<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteCategoryModal extends ModalComponent
{
    public $category;

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function delete()
    {
        $this->category->delete();
        $this->emit('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.delete-category-modal');
    }
}
