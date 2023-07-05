<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartUpdate extends Component
{
    public $cartItems = [];
    public $quantity = 1;
    protected $listeners = ['updateCart'];

    public function mount($item){
        $this->cartItems = $item;
        $this->quantity = $item['quantity'];
    }

    public function increment()
    {
        $this->quantity++;
        $this->emit('updateCart');
    }

    public function decrement()
    {
        if($this->quantity > 1){
            $this->quantity--;
            $this->emit('updateCart');
        }
    }

    public function updateCart(){
        \Cart::update($this->cartItems['id'], [
            'quantity' => [
                'relative' => false,
                'value' => $this->quantity
            ]
        ]);

        $this->emit('cartUpdated');
        $this->emit('addToCart');
    }

    public function render()
    {
        return view('livewire.cart-update');
    }
}
