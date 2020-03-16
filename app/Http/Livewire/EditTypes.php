<?php

namespace App\Http\Livewire;

use App\Service;
use App\Type;
use Livewire\Component;

class EditTypes extends Component
{
    protected $listeners = ['typeEdit' => 'edit'];
    public $selected_id, $service_id, $name, $description, $services;

    public function render()
    {
        $this->services = Service::all();
        return view('livewire.edit-types');
    }

    public function edit($id)
    {

        $record = Type::findOrFail($id);

        $this->selected_id = $id;
        $this->service_id = $record->service_id;
        $this->name = $record->name;
        $this->description = $record->description;

        $this->updateMode = true;
        $this->dispatchBrowserEvent('open-modal');
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'service_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($this->selected_id) {
            $record = Type::find($this->selected_id);
            $record->update([
                'service_id' => $this->service_id,
                'name' => $this->name,
                'description' => $this->description
            ]);

            $this->reset();
            $this->updateMode = false;
            $this->emit('typeAdded', 'updated');
            $this->dispatchBrowserEvent('closee-modal');
        }
    }
}
