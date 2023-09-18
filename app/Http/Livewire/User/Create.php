<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
    public $name, $email, $password, $password_confirmation;
    public $force_password_change = true;
    public $role = "";
    public $selectedPermissions = [];

    protected $listeners = ['refresh' => '$refresh'];

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
                'force_password_change' =>  ["boolean"],
            ],
        );
        $user = User::create($validatedData);
        $user->assignRole($this->role);
        $user->syncPermissions($this->selectedPermissions);

        $this->emit('pg:eventRefresh-default');
        $this->closeModal();
    }

    public function generatePassword($length = 8)
    {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*";
        $randomString = substr(str_shuffle(str_repeat($characters, $length)), 0, $length);

        $this->password = $this->password_confirmation = $randomString;
    }

    public function render()
    {
        $permissions = Permission::get(['id', 'name']);
        $roles = Role::get(['id', 'name']);
        return view('livewire.user.create', compact('roles', 'permissions'));
    }
}
