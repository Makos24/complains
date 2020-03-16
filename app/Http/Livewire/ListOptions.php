<?php

namespace App\Http\Livewire;

use App\Option;
use Livewire\Component;

class ListOptions extends Component
{
    protected $listeners = ['optionAdded' => 'showOptionAddedMessage'];
    public $added = '';
    public function render()
    {
        $options = Option::all();
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
