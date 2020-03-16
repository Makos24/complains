<?php

namespace App\Http\Livewire;

use App\Service;
use Livewire\Component;

class ListServices extends Component
{
    protected $listeners = ['serviceAdded' => 'showServiceAddedMessage'];
    public $added = '';

    public function render()
    {
        $services = Service::all();
        return view('livewire.list-services', compact('services'));
    }

    public function showServiceAddedMessage($d)
    {
        $this->added = $d;
    }


    public function destroy($id)
    {
        if ($id) {
            $record = Service::where('id', $id);
            $record->delete();
            $this->emit('serviceAdded', 'deleted');
        }
    }
}
