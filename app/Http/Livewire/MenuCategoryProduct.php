<?php

namespace App\Http\Livewire;
use App\Models\Product_Category;
use Livewire\Component;

class MenuCategoryProduct extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Product_Category::where('deleted_at',null)->get();
    }

    public function render()
    {
        return view('livewire.menu-category-product');
    }
}
