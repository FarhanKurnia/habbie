<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class SidebarNav extends Component
{
    public $constantNav = [
        "dashboard" => "Dashboard",
        "products" => [
            [ "name" => "Products", "route_name" => "indexProducts" ],
            [ "name" => "List Product", "route_name" => "indexProducts" ],
            [ "name" => "Category Product", "route_name" => "indexCategories" ],
            [ "name" => "Discount", "route_name" => "indexDiscounts" ]
        ],
        "articles" => [
            [ "name" => "Articles", "route_name" => "indexArticles" ],
            [ "name" => "List Article", "route_name" => "indexArticles" ],
        ],
        // "orders" => "Orders",
        // "membership" => "Membership",
        // "offers" => "Offers",
        // "media" => [
        //     "Media",
        //     "List Article",
        //     "Category Article"
        // ],
        // "testimonials" => [
        //     "Testimonials",
        //     "Add Testimonials",
        //     "Add Reviews"
        // ],
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
