<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

class UpdateProfile extends Component
{
    public $user, $name, $email, $bio, $username;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->bio = $user->bio;
        $this->username = $user->username;
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', 'string'],
                'email' => ['required', 'string', Rule::unique(User::class)->ignore($this->user)],
                'bio' => ['required'],
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
