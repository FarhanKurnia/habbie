<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 1;

    public function increment()
    {
        $this->count++;
        $this->emit('quantityUpdated', $this->count);
    }

    public function decrement()
    {
        if($this->count > 1){
            $this->count--;
        }

        $this->emit('quantityUpdated', $this->count);

    }

    public function render()
    {
        return view('livewire.counter');
    }
}
