<?php

namespace App\Http\Livewire;

use App\Option;
use App\Type;
use Livewire\Component;

class EditOption extends Component
{
    protected $listeners = ['optionEdit' => 'edit'];
    public $selected_id, $type_id, $name, $description, $types, $amount, $requirements, $fx_amount, $b1,$c1,$d1,$radio,$radio1;

    public function render()
    {

        if(!empty($this->fx_amount) && $this->radio == 1){
            $this->amount = $this->fx_amount;
        }
        
        if(!empty($this->b1) && !empty($this->c1) && !empty($this->d1) && $this->radio == 2){
            $this->amount = ($this->b1 * $this->c1) + ($this->b1 * $this->d1);
        }

        $this->types = Type::all();
        return view('livewire.edit-option');
    }

    public function edit($id)
    {

        $record = Option::findOrFail($id);

        $this->selected_id = $id;
        $this->type_id = $record->type_id;
        $this->name = $record->name;
        $this->amount = $record->amount;
        $this->requirements = $record->requirements;
        $this->description = $record->description;
        $this->fx_amount = $record->fx_amount;
        $this->b1 = $record->b1;
        $this->c1 = $record->c1;
        $this->d1 = $record->d1;

        $this->updateMode = true;
        $this->dispatchBrowserEvent('open-modal');
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'type_id' => 'required',
            'name' => 'required',
            'requirements' => 'required',
            'amount' => 'required',
            'description' => 'required'
        ]);

        if ($this->selected_id) {
            $record = Option::find($this->selected_id);
            $record->update([
                'type_id' => $this->type_id,
                'name' => $this->name,
                'amount' => $this->amount,
                'requirements' => $this->requirements,
                'fx_amount' => $this->fx_amount,
                'b1' => $this->b1,
                'c1' => $this->c1,
                'd1' => $this->d1,
                'description' => $this->description
            ]);

            $this->reset();
            $this->updateMode = false;
            $this->emit('optionAdded', 'updated');
            $this->dispatchBrowserEvent('closee-modal');
        }
    }
}
