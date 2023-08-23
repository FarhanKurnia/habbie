<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class SidebarNav extends Component
{
    public $constantNav = [
        "dashboard" => "Dashboard",
        "indexOrders" => 'Orders',
        "products" => [
            [ "name" => "Products", "route_name" => "indexProducts" ],
            [ "name" => "List Product", "route_name" => "indexProducts" ],
            [ "name" => "Category Product", "route_name" => "indexCategories" ],
            [ "name" => "Discount", "route_name" => "indexDiscounts" ]
        ],
        "media" => [
            [ "name" => "Media", "route_name" => "media" ],
            [ "name" => "List Article", "route_name" => "indexArticles" ],
            [ "name" => "List Career", "route_name" => "indexCareers" ],
        ],
        "indexOffers" => 'Offers',
        "indexTestimonials" => 'Testimonials',
    ];

    public $activeNav;

    public function handleNavClick($nav, $key)
    {
        $this->activeNav = $nav;
        return redirect()->route($key);
    }

    public function render()
    {
        return view('livewire.admin.sidebar-nav');
    }
}
