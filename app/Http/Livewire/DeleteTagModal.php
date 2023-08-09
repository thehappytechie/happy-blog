<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteTagModal extends ModalComponent
{
    public $tag;

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public function mount(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function delete()
    {
        $this->tag->delete();
        $this->emit('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.delete-tag-modal');
    }
}
