<?php

namespace App\Http\Livewire;

use App\Service;
use App\Type;
use Livewire\Component;

class CreateType extends Component
{
    public $services, $service_id, $name, $description;

    public function render()
    {
        $this->services = Service::all();
        return view('livewire.create-type');
    }

    public function create()
    {
        Type::create($this->validate([
            'service_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]));
        $this->reset();
        $this->emit('typeAdded', 'created');
        $this->dispatchBrowserEvent('close-modal');
    }
}
