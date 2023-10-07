<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MobileMenuButton extends Component
{
    public function toggleMobileMenu()
    {
        $this->emit('toggleMobileMenu');
    }
    
    public function render()
    {
        return view('livewire.mobile-menu-button');
    }
}
