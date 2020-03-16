<?php

namespace App\Http\Livewire;

use App\Complain;
use Livewire\Component;

class ListComplains extends Component
{
    protected $listeners = ['complainAdded' => 'showComplainAddedMessage'];
    public $added = '';

    public function render()
    {
        $complains = Complain::paginate(20);
        return view('livewire.list-complains', compact('complains'));
    }

    public function showComplainAddedMessage($d)
    {
        $this->added = $d;
    }
}
