<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartList extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];
    public $cartItems = [];

    public function refreshCart()
    {
        $this->cartItems = \Cart::getContent();
    }

    public function removeCart($id)
    {
        \Cart::remove($id);
        $this->emit('addToCart');

        $msg = 'Item has removed !';
        $this->emit('showToast', $msg);
    }

    public function render()
    {
        $this->cartItems = \Cart::getContent();
        return view('livewire.cart-list');
    }
}
