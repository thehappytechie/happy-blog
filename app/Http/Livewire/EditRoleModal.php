<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class EditRoleModal extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public $role, $name;

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', Rule::unique(Role::class)->ignore($this->role)],
            ],
        );
        $this->role->update($validatedData);
        $this->emit('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.edit-role-modal');
    }
}
