<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;

class HeaderRecommendation extends Component
{
    public $product;

    public function mount(){
        $products = new Product();
        $this->product = $products->all()->random(1);
    }

    public function render()
    {
        return view('livewire.header-recommendation');
    }
}
