<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Validation\Rules\Password;

class AddUserModal extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'xl';
    }

    public $name, $email, $password, $password_confirmation;
    public $disable_login = false;
    public $force_password_change = false;

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', 'string'],
                'email' => ['required', 'email', 'string'],
                'password' => ['required', 'confirmed', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()],
                'disable_login' =>  ["boolean", "nullable"],
            ],
        );
        User::create($validatedData);
        $this->emit('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.add-user-modal');
    }
}
