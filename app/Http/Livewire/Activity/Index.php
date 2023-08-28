<?php

namespace App\Http\Livewire\Activity;

use Livewire\Component;
use OwenIt\Auditing\Models\Audit;

class Index extends Component
{

    public function render()
    {
        $audits = Audit::with('user')->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.activity.index', compact('audits'));
    }
}
