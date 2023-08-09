<?php

namespace App\Http\Livewire\Tag;

use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        return view('livewire.tag.index');
    }
}
