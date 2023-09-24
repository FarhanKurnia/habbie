<?php

namespace App\Http\Livewire\Admin;
use App\Models\Product;
use Livewire\Component;

class Toggle extends Component
{
    public $status;
    public $productId;

    public function setStatus()
    {
        $product = Product::find($this->productId);

        if ($this->status === 'active') {
            $product->update(['status' => 'non-active']);
            $this->status = 'non-active';
        } else {
            $product->update(['status' => 'active']);
            $this->status = 'active';
        }
    }

    public function mount($productId)
    {
        $product = Product::find($productId);

        $this->status = $product->status;
        $this->productId = $productId;
    }

    public function render()
    {

        return view('livewire.admin.toggle');
    }
}
