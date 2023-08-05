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
    public $allProduct;
    public $selectedData = [];

    protected function getAllProduct()
    {
        $allProduct = Product::where('deleted_at',null)->get();
        $this->allProduct = $allProduct;
    }

    protected function filterProductByCategoryId($categoryId)
    {
        $data = collect($this->allProduct)
        ->where('category_id', $categoryId)
        ->values()->toArray();

        if(!empty($data)){
            $this->selectedData = $data;
        }

        $this->emit('slideChanges');
    }
    
    public function handleIconClick($categoryId)
    {
        $this->loading = true;
        $this->activeSlide = $categoryId;
        $this->filterProductByCategoryId($categoryId);
        $this->loading = false;
    }


    public function mount()
    {
        $this->categories = Product_Category::where('deleted_at',null)->get();
        $categoryId = $this->categories[0]->id_category;
        $this->activeSlide = $categoryId;
        $this->getAllProduct();
        $this->filterProductByCategoryId($categoryId);
    }

    public function render()
    {
        return view('livewire.slider-story-product');
    }
}
