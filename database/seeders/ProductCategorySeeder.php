<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_categories')->insert([[
            'name' => 'Aromatic Telon Oil Flower Series',
            'slug' => 'aromatic-telon-oil-flower-series',
            'icon' => 'storage/img/categories_product/telon-oil-flower.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Aromatic Telon Oil Tea Series',
            'slug' => 'aromatic-telon-oil-tea-series',
            'icon' => 'storage/img/categories_product/telon-oil-tea.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
        ,
        [
            'name' => 'Aromatic Cajuput Oil Saffron Series',
            'slug' => 'aromatic-cajuput-oil-saffron-series',
            'icon' => 'storage/img/categories_product/cajuput-oil-saffron.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
        ,
        [
            'name' => 'Aromatic Cajuput Oil Vanilla Series',
            'slug' => 'aromatic-cajuput-oil-vanilla-series',
            'icon' => 'storage/img/categories_product/cajuput-oil-vanilla.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
    
    
    
    
    ]);
    }
}
