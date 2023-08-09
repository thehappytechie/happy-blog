<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class BulkDeleteTagModal extends ModalComponent
{
    public ?int $tagId = null;

    public array $tagIds = [];

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public function confirm()
    {
        if ($this->tagId) {
            Tag::query()->find($this->tagId)->delete();
        }

        if ($this->tagIds) {
            Tag::query()->whereIn('id', $this->tagIds)->delete();
        }

        $this->closeModalWithEvents([
            'pg:eventRefresh-default',
        ]);
    }

    public function render()
    {
        return view('livewire.bulk-delete-tag-modal');
    }
}
