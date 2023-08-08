<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class SidebarNav extends Component
{
    public $constantNav = [
        "dashboard" => "Dashboard",
        "products" => [
            "Products",
            "List Product",
            "Category Product",
            "Discount"
        ],
        "orders" => "Orders",
        "membership" => "Membership",
        "offers" => "Offers",
        "media" => [
            "Media",
            "List Article",
            "Category Article"
        ],
        "testimonials" => [
            "Testimonials",
            "Add Testimonials",
            "Add Reviews"
        ],
    ];

    public $activeNav;

    public function handleNavClick($nav)
    {
        $this->activeNav = $nav;
    }

    public function render()
    {
        return view('livewire.admin.sidebar-nav');
    }
}
