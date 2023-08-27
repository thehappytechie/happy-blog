<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class AddPermissionModal extends ModalComponent
{
    public $name, $guard_name;

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', 'string', Rule::unique(Permission::class)],
            ],
        );
        Permission::create($validatedData);
        $this->emit('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.add-permission-modal');
    }
}
