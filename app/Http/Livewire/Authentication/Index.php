<?php

namespace App\Http\Livewire\Authentication;

use App\Models\User;
use Livewire\Component;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\DB;
use Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog;

class Index extends Component
{
     public User $user;

    public function mount(User $user)
    {

        $this->user = $user;
    }
    public function render()
    {
        $agent = new Agent();
        $authentications = AuthenticationLog::paginate(5);
        return view('livewire.authentication.index', compact('authentications' ,'agent'));
    }
}
