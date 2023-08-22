<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

class UpdateProfile extends Component
{
    public $user, $name, $email, $bio, $username, $title, $website;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->bio = $user->bio;
        $this->username = $user->username;
        $this->title = $user->title;
        $this->website = $user->website;
    }

    public function save()
    {
        $validatedData = $this->validate(
            [
                'name' => ['required', 'string'],
                'email' => ['required', 'string', Rule::unique(User::class)->ignore($this->user)],
                'bio' => ['string', 'nullable'],
                'username' => ['string', Rule::unique(User::class)->ignore($this->user), 'nullable'],
                'title' => ['string', 'nullable'],
                'website' => ['url:http,https', 'nullable'],
            ],
        );
        $this->user->update($validatedData);
        session()->flash('success', 'Profile updated successfully.');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.user.update-profile');
    }
}
