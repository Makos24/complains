<?php

namespace App\Http\Livewire;

use App\Service;
use Livewire\Component;

class EditService extends Component
{
    protected $listeners = ['serviceEdit' => 'edit'];
    public $name = '';
    public $description = '';
    public $selected_id = '';

    public function render()
    {
        return view('livewire.edit-service');
    }

    public function edit($id)
    {

        $record = Service::findOrFail($id);

        $this->selected_id = $id;
        $this->name = $record->name;
        $this->description = $record->description;

        $this->updateMode = true;
        $this->dispatchBrowserEvent('open-modal');
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required',
            'description' => 'required'
        ]);

        if ($this->selected_id) {
            $record = Service::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'description' => $this->description
            ]);

            $this->reset();
            $this->updateMode = false;
            $this->emit('serviceAdded', 'updated');
            $this->dispatchBrowserEvent('closee-modal');
        }
    }
}
