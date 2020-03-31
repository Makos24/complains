<?php

namespace App\Http\Livewire;

use App\Option;
use App\Type;
use Livewire\Component;

class CreateOption extends Component
{
    public $types, $type_id, $name, $payment_type, $description,$amount,$requirements,$fx_amount,$b1,$c1,$d1,$type1;
    
    public function render()
    {

        if(!empty($this->fx_amount) && $this->payment_type == 1){
           $this->c1 = 0;
           $this->d1 = 0;
          
            $this->amount = 0;
            
        }
        
        if(!empty($this->c1) && !empty($this->d1) && $this->payment_type == 2){
            $this->fx_amount = 0;
            $this->amount = 0;
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
            'payment_type' => 'required',
            'fx_amount' => 'required',
            'c1' => 'required',
            'd1' => 'required',
            'description' => 'required'
        ]));

        $this->reset();
        $this->emit('optionAdded', 'created');
        $this->dispatchBrowserEvent('close-modal');
    }
}
