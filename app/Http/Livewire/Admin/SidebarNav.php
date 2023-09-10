<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class SidebarNav extends Component
{
    public $constantNav = [
        "dashboard" => "Dashboard",
        "indexOrders" => [
            ["name" => "Orders", "route_name" => 'indexOrders'],
            ["name" => "All Orders", "route_name" => 'indexOrders'],
            ["name" => "Order Status", "route_name" => 'indexOrders',
                "data" => [
                            ["name" => "Done", "route_name" => 'indexOrders', "query" => ['status' => 'done'] ],
                            ["name" => "Failed", "route_name" => 'indexOrders', "query" => ['status' => 'failed']],
                            ["name" => "Order", "route_name" => 'indexOrders', "query" => ['status' => 'order']],
                            ["name" => "Process", "route_name" => 'indexOrders', "query" => ['status' => 'process']],
                            ["name" => "Cancel", "route_name" => 'indexOrders', "query" => ['status' => 'cancel']],
                        ]
            ]
        ],
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
        "indexReviews" => "Reviews",
        "indexResellers" => "Resellers",
        "indexUsers" => "Users"
    ];

    public $activeNav;

    public function handleNavClick($nav, $key, $query = null )
    {
        $this->activeNav = $nav;

        if ($query) {
            return redirect()->route($key, json_decode($query, true));
        }

        return redirect()->route($key);
    }

    public function render()
    {
        return view('livewire.admin.sidebar-nav');
    }
}
