<?php

namespace App\Http\Livewire;

use App\Complain;
use App\Option;
use App\Service;
use App\Type;
use Livewire\Component;

class CreateComplain extends Component
{
    public $service_id, $type_id, $option_id, $name, $address, $phone, $description;
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

        $services = Service::all();

        return view('livewire.create-complain', compact('services'));
    }

    public function create()
    {
        $this->validate([
            'service_id' => 'required',
            'type_id' => 'nullable',
            'option_id' => 'nullable',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        Complain::create([
            'user_id' => auth()->id(),
            'service_id' => $this->service_id,
            'type_id' => $this->type_id,
            'option_id' => $this->option_id,
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'complain_id' => sha1(now()),
            'cost' => 100,
        ]);

        $this->reset();
        $this->emit('complainAdded', 'filed');
        $this->dispatchBrowserEvent('close-modal');
    }
}
