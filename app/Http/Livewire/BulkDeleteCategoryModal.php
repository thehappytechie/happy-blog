<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class BulkDeleteCategoryModal extends ModalComponent
{
    public static function destroyOnClose(): bool
    {
        return true;
    }

    public ?int $categoryId = null;

    public array $categoryIds = [];

    public static function modalMaxWidth(): string
    {
        return 'xxl';
    }

    public function confirm()
    {
        if ($this->categoryId) {
            Category::query()->find($this->categoryId)->delete();
        }

        if ($this->categoryIds) {
            Category::query()->whereIn('id', $this->categoryIds)->delete();
        }
        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);
    }

    public function render()
    {
        return view('livewire.bulk-delete-category-modal');
    }
}
