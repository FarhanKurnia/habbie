<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddToCart extends Component
{
    public $quantity;
    public $product;

    protected $listeners = ['quantityUpdated'];

    public function quantityUpdated($value)
    {
        $this->quantity = $value;
    }

    public function addToCart()
    {
        // init
        $discountId = null;
        $discount = null;
        $discountPrice = 0;
        $fixprice = $this->product->price;

        
        if($this->product->discount_id){
            $normalPrice = $this->product->price;
            $discount = $this->product->discount->rule;
            $discountPrice = ($discount / 100) * $normalPrice;
            $fixprice = $normalPrice - $discountPrice;
            $discountId = $this->product->discount_id;
            $discountPrice = $this->product->price * (($this->product->discount->rule) / 100);
        } 
        
        // dd($fixprice);
        $quantity = $this->quantity ?? 1;

        // dd([
        //     'id' => $this->product->id_product,
        //     'name' => $this->product->name,
        //     'price' => floatval($fixprice),
        //     'quantity' => intval($quantity),
        //     'attributes' => [
        //         'image' => $this->product->image,
        //         'slug' => $this->product->slug,
        //         'discount_id' => $discountId,
        //         'discount_price' => $discountPrice
        //     ]
        // ]);
        
        \Cart::add([
            'id' => $this->product->id_product,
            'name' => $this->product->name,
            'price' => floatval($fixprice),
            'quantity' => intval($quantity),
            'attributes' => [
                'image' => $this->product->image,
                'slug' => $this->product->slug,
                'discount_id' => $discountId,
                'discount_price' => $discountPrice,
                'original_price' => $this->product->price,
                'discount_rule' => $discount
            ]
        ]);
        $msg = 'Product added to cart successfully.';

        $this->emit('showToast', $msg);
        $this->emit('addToCart');
    }

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
