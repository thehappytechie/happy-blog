<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdateProfile extends Component
{
    public $user, $name, $email, $bio, $username, $title, $website;

    public function mount(User $user)
    {
        $this->user = $user;

        $fields = ['name', 'email', 'bio', 'username', 'title', 'website'];

        foreach ($fields as $field) {
            $this->{$field} = $user->{$field};
        }
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
        return redirect()->route('user.update.profile', Auth::user()->id);
    }

    public function render()
    {
        return view('livewire.user.update-profile');
    }
}
