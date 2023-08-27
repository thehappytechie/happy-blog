<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class DeletePermissionModal extends ModalComponent
{
    public $permission;

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public function mount(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function delete()
    {
        $this->permission->delete();
        $this->emit('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.delete-permission-modal');
    }
}
