<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class EditPermissionModal extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public $permission, $name;

    public function mount(Permission $permission)
    {
        $this->permission = $permission;
        $this->name = $permission->name;
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', Rule::unique(Permission::class)->ignore($this->permission)],
            ],
        );
        $this->permission->update($validatedData);
        $this->emit('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.edit-permission-modal');
    }
}
