<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class AddRoleModal extends ModalComponent
{
    public $name;

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', 'string', Rule::unique(Role::class)],
            ],
        );
        Role::create($validatedData);
        $this->emit('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.add-role-modal');
    }
}
