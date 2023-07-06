<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Toast extends Component
{
    public $showToast = false;
    public $message;

    protected $listeners = ['showToast', 'hideToast'];
    
    public function hideToast($value){
        $this->showToast = $value;
    }

    public function showToast($value)
    {
        $this->showToast = true;
        $this->message = $value;
    }

    public function render()
    {
        return view('livewire.toast');
    }
}
