<?php

namespace App\Http\Livewire;

use App\Option;
use App\Type;
use Livewire\Component;

class CreateOption extends Component
{
    public $types, $type_id, $name, $description,$amount,$requirements,$fx_amount,$b1,$c1,$d1,$radio,$radio1;
    public function render()
    {

        if(!empty($this->fx_amount) && $this->radio == 1){
            $this->amount = $this->fx_amount;
        }
        
        if(!empty($this->b1) && !empty($this->c1) && !empty($this->d1) && $this->radio == 2){
            $this->amount = ($this->b1 * $this->c1) + ($this->b1 * $this->d1);
        }
        
        $this->types = Type::all();
        return view('livewire.create-option');
    }

    public function create()
    {
        Option::create($this->validate([
            'type_id' => 'required',
            'name' => 'required',
            'requirements' => 'required',
            'amount' => 'required',
            'fx_amount' => 'nullable',
            'b1' => 'nullable',
            'c1' => 'nullable',
            'd1' => 'nullable',
            'description' => 'required'
        ]));
        $this->reset();
        $this->emit('optionAdded', 'created');
        $this->dispatchBrowserEvent('close-modal');
    }
}
