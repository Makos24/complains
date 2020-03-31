<?php

namespace App\Http\Livewire;

use App\Complain;
use App\Option;
use App\Service;
use App\Type;
use Livewire\Component;

class EditComplain extends Component
{
    protected $listeners = ['complainEdit' => 'edit'];
    public $selected_id, $service_id, $type_id, $option_id, $name, $address,
     $phone, $description,$option,$requirements,$amount,$plot_no,$opt,$pt,$b1,$email;
    public $types = [];
    public $options = [];

    public function render()
    {
        if (!empty($this->service_id)) {
            $this->types = Type::where('service_id', $this->service_id)->get();
        }

        if (!empty($this->type_id)) {
            $this->options = Option::where('type_id', $this->type_id)->get();
        }

        if (!empty($this->option_id)) {
            $option = Option::find($this->option_id);
            $this->description = $option->description;
            $this->requirements = $option->requirements;
            $this->amount = $option->amount;
             $this->pt = $option->payment_type;
            $this->opt = $option;
        }
        

        if(!empty($this->b1) && $this->pt == 2){
            $this->amount = ($this->b1 * $this->opt->c1) + ($this->b1 * $this->opt->d1);

        }

        $services = Service::all();


        return view('livewire.edit-complain', compact('services'));
    }

    
    public function edit($id)
    {

        $record = Complain::findOrFail($id);

        $this->selected_id = $id;
        $this->service_id = $record->service_id;
        $this->type_id = $record->type_id;
        $this->option_id = $record->option_id;
        $this->name = $record->name;
        $this->amount = $record->cost;
        $this->b1 = $record->b1;
        $this->phone = $record->phone;
        $this->address = $record->address;
        $this->email = $record->email;
        $this->plot_no = $record->plot_no;
        $this->requirements = $record->requirements;
        $this->description = $record->description;
        

        $this->updateMode = true;
        $this->dispatchBrowserEvent('open-modal');
    }

    public function update()
    {
        $this->validate([
           'service_id' => 'required',
           'plot_no' => 'required',
            'type_id' => 'nullable',
            'option_id' => 'nullable',
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'description' => 'nullable',
            'requirements' => 'nullable',
        ]);

        if ($this->selected_id) {
            $record = Complain::find($this->selected_id);
            $record->update([
            'plot_no' => $this->plot_no,
            'service_id' => $this->service_id,
            'type_id' => $this->type_id,
            'option_id' => $this->option_id,
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'complain_id' => sha1(now()),
            'cost' => $this->amount,
            'b1' => $this->b1,
            'description' => $this->description,
            'requirements' => $this->requirements,
            ]);

            $this->reset();
            $this->updateMode = false;
            $this->emit('complainAdded', 'updated');
            $this->dispatchBrowserEvent('closee-modal');
        }
    }

    
}
