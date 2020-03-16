<?php

namespace App\Http\Livewire;

use App\Service;
use Livewire\Component;

class CreateService extends Component
{
    public $name = '';
    public $description = '';

    public function render()
    {

        return view('livewire.create-service');
    }

    public function create()
    {
        Service::create($this->validate([
            'name' => 'required',
            'description' => 'required'
        ]));
        $this->reset();
        $this->emit('serviceAdded', 'created');
        $this->dispatchBrowserEvent('close-modal');
    }
}
