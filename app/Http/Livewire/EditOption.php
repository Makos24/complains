<?php

namespace App\Http\Livewire;

use App\Option;
use App\Type;
use Livewire\Component;

class EditOption extends Component
{
    protected $listeners = ['optionEdit' => 'edit'];
    public $selected_id, $type_id, $name, $description, $types;

    public function render()
    {
        $this->types = Type::all();
        return view('livewire.edit-option');
    }

    public function edit($id)
    {

        $record = Option::findOrFail($id);

        $this->selected_id = $id;
        $this->type_id = $record->type_id;
        $this->name = $record->name;
        $this->description = $record->description;

        $this->updateMode = true;
        $this->dispatchBrowserEvent('open-modal');
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'type_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($this->selected_id) {
            $record = Option::find($this->selected_id);
            $record->update([
                'type_id' => $this->type_id,
                'name' => $this->name,
                'description' => $this->description
            ]);

            $this->reset();
            $this->updateMode = false;
            $this->emit('optionAdded', 'updated');
            $this->dispatchBrowserEvent('closee-modal');
        }
    }
}
