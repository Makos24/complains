<?php

namespace App\Http\Livewire;

use App\Complain;
use Livewire\Component;

class RecentComplains extends Component
{
    public function render()
    {
        $complains = Complain::paginate(10);
        return view('livewire.recent-complains', compact('complains'));
    }
}
