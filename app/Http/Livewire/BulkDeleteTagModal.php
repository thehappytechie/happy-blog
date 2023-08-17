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
        $ids = $this->tagId ? [$this->tagId] : $this->tagId;

        if ($ids) {
            Tag::query()->whereIn('id', $ids)->delete();
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
