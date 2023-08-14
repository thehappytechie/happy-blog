<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

class UpdateProfile extends Component
{
    public $user, $name, $email;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', 'string'],
                'email' => ['required', 'string', Rule::unique(User::class)->ignore($this->user)],
            ],
        );
        $this->user->update($validatedData);
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.user.update-profile');
    }
}
