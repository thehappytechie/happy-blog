<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
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
    public $force_password_change = true;

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', 'string'],
                'email' => ['required', 'email', 'string', Rule::unique(User::class)],
                'password' => ['required', 'confirmed', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->uncompromised()],
                'disable_login' =>  ["boolean", "nullable"],
                'force_password_change' =>  ["boolean"],
            ],
        );
        User::create($validatedData);
        $this->emit('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function generatePassword($length = 8)
    {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*";
        $charactersLength = strlen($characters);

        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $this->password = $randomString;
        $this->password_confirmation = $randomString;
    }

    public function render()
    {
        return view('livewire.add-user-modal');
    }
}
