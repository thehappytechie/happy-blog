<?php

namespace App\Http\Livewire\User;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rules\Password;

class Show extends Component
{
    public $user, $name, $email, $password, $password_confirmation, $role;
    public $selectedRole;
    public $roles;
    public $selectedPermissions = [];
    public $permissions;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;

        $this->permissions = Permission::all();
        $this->selectedPermissions = $this->user->permissions->pluck('name')->toArray();
        $this->roles = Role::all();
        $this->selectedRole = $this->user->roles->pluck('name')->first();
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', 'string'],
                'email' => ['required', 'email', 'string', Rule::unique(User::class)->ignore($this->user)],
                'password' => ['confirmed', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->uncompromised(), 'nullable'],
            ],
        );

        $this->user->update($validatedData);
        $this->user->syncPermissions($this->selectedPermissions);
        $this->user->syncRoles($this->selectedRole);
        session()->flash('success', 'User updated successfully.');
        return redirect()->route('user.index');
    }

    public function updatedSelectedRole($role)
    {
        $this->selectedRole = $role;
    }

    public function updatedSelectedPermissions($permissions)
    {
        $this->selectedPermissions = $permissions;
    }

    public function generatePassword($length = 8)
    {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*";
        $randomString = substr(str_shuffle(str_repeat($characters, $length)), 0, $length);

        $this->password = $this->password_confirmation = $randomString;
    }

    public function render()
    {
        $posts = Post::where('user_id', '=', $this->user->id)->get();
        return view('livewire.user.show', compact('posts'));
    }
}
