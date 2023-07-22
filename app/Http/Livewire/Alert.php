<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $message;
    public $background;
    public $visible = true;

    public function close()
    {
        $this->visible = false;
    }

    public function render()
    {
        return view('livewire.alert');
    }
}
