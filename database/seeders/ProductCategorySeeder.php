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
            'name' => 'Aromatic Telon Oil Flower',
            'slug' => 'aromatic-telon-oil-flower',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Aromatic Telon Oil Tea',
            'slug' => 'aromatic-telon-oil-tea',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
        ,
        [
            'name' => 'Aromatic Cajuput Oil Saffron',
            'slug' => 'aromatic-cajuput-oil-saffron',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
        ,
        [
            'name' => 'Aromatic Cajuput Oil Vanilla',
            'slug' => 'aromatic-cajuput-oil-vanilla ',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
    
    
    
    
    ]);
    }
}
