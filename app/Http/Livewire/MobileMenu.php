<?php

namespace App\Http\Livewire;
use App\Models\Product_Category;
use Livewire\Component;

class MobileMenu extends Component
{
    public $showMobileMenu = false;
    public $categories;

    protected $listeners = ['toggleMobileMenu' => 'toggle'];

    public function toggle()
    {
        $this->showMobileMenu = !$this->showMobileMenu;
    }

    public function mount()
    {
        $this->categories = Product_Category::where('deleted_at',null)->get();
    }
    
    public function render()
    {
        return view('livewire.mobile-menu');
    }
}
