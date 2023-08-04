<?php

namespace App\Http\Livewire;
use App\Models\Product_Category;
use App\Models\Product;
use Livewire\Component;

class SliderStoryProduct extends Component
{
    public $activeSlide;
    public $productsByCategory;
    public $loading = false;

    
    protected function getProductsByCategory($categoryId)
    {
        $productsByCategory = Product::where('category_id', $categoryId)->with('category')->get();
        $this->productsByCategory = $productsByCategory;
        $this->emit('slideChanges');
    }
    
    public function handleIconClick($categoryId)
    {
        $this->loading = true;
        $this->activeSlide = $categoryId;
        $this->getProductsByCategory($categoryId);
        $this->loading = false;
    }


    public function mount()
    {
        $this->categories = Product_Category::where('deleted_at',null)->get();
        $categoryId = $this->categories[0]->id_category;
        $this->activeSlide = $categoryId;
        $this->getProductsByCategory($categoryId);
    }

    public function render()
    {
        return view('livewire.slider-story-product');
    }
}
