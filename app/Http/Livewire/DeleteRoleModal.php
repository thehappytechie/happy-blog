<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class DeleteRoleModal extends ModalComponent
{
    public $role;

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public function mount(Role $role)
    {
        $this->role = $role;
    }

    public function delete()
    {
        $this->role->delete();
        $this->emit('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.delete-role-modal');
    }
}
