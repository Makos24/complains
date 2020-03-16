<?php

namespace App\Http\Livewire;

use App\Option;
use App\Type;
use Livewire\Component;

class CreateOption extends Component
{
    public $types, $type_id, $name, $description;
    public function render()
    {
        $this->types = Type::all();
        return view('livewire.create-option');
    }
    public function create()
    {
        Option::create($this->validate([
            'type_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]));
        $this->reset();
        $this->emit('optionAdded', 'created');
        $this->dispatchBrowserEvent('close-modal');
    }
}
