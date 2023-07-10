<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InfoTotal extends Component
{
    public $ongkir;
    public $total;

    protected $listeners = ['setOngkir'];

    public funCtion setOngkir($value)
    {
        if(!!$value){
            $this->ongkir = $value;
            $this->total = \Cart::getTotal() + $this->ongkir['value'];
        }
    }

    public function render()
    {
        return view('livewire.info-total');
    }
}
