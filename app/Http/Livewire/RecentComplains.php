<?php

namespace App\Http\Livewire;

use App\Complain;
use Livewire\Component;

class RecentComplains extends Component
{
    protected $listeners = ['complainAdded' => 'showComplainAddedMessage'];

    public $added = '';

    public function render()
    {
        $complains = Complain::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.recent-complains', compact('complains'));
    }

    public function showComplainAddedMessage($d)
    {
        $this->added = $d;
    }

    public function resolved($id)
    {
        if ($id) {
            $record = Complain::where('id', $id);
            $record->update(['status' => 1]);
            $this->emit('complainAdded', 'resolved');
        }
    }

    public function pending($id)
    {
        if ($id) {
            $record = Complain::where('id', $id);
            $record->update(['status' => 0]);
            $this->emit('complainAdded', 'marked as pending');
        }
    }
}
