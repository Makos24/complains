<?php

namespace App\Http\Livewire;

use App\Complain;
use Livewire\Component;
use Livewire\WithPagination;

class ResolvedComplains extends Component
{
    use WithPagination;
    
    protected $listeners = ['complainAdded' => 'showComplainAddedMessage'];
    public $added = '', $search;

    protected $updatesQueryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
         $complains = Complain::search($this->search)->orderBy('created_at', 'desc')->where('status', 1)->paginate(20);
        return view('livewire.resolved-complains', compact('complains'));
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
