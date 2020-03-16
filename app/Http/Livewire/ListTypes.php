<?php

namespace App\Http\Livewire;

use App\Type;
use Livewire\Component;

class ListTypes extends Component
{
    protected $listeners = ['typeAdded' => 'showTypeAddedMessage'];
    public $added = '';

    public function render()
    {
        $types = Type::with('service')->paginate(20);
        return view('livewire.list-types', compact('types'));
    }

    public function showTypeAddedMessage($d)
    {
        $this->added = $d;
    }


    public function destroy($id)
    {
        if ($id) {
            $record = Type::where('id', $id);
            $record->delete();
            $this->emit('typeAdded', 'deleted');
        }
    }
}
