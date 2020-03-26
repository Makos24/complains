<?php

namespace App\Http\Livewire;

use App\Option;
use Livewire\Component;
use Livewire\WithPagination;

class ListOptions extends Component
{
    use WithPagination;
    protected $listeners = ['optionAdded' => 'showOptionAddedMessage'];
    public $added = '', $search;

    protected $updatesQueryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        $options = Option::search($this->search)->paginate(20);
        return view('livewire.list-options', compact('options'));
    }

    public function showOptionAddedMessage($d)
    {
        $this->added = $d;
    }


    public function destroy($id)
    {
        if ($id) {
            $record = Option::where('id', $id);
            $record->delete();
            $this->emit('optionAdded', 'deleted');
        }
    }
}
