<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UpdatePassword extends Component
{
    public $user, $current_password, $password_confirmation, $password, $user_id;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->id = $user->id;
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'current_password' => ['required', 'string', 'current_password:web'],
                'password' => ['required', 'confirmed', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()],
            ],
        );
        $user = User::findOrFail(Auth::user()->id);
        $user->update($validatedData);
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.user.update-password');
    }
}
