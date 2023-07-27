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
            'name' => 'Telon Oil Flower',
            'slug' => 'telon-oil-flower',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Telon Oil Tea',
            'slug' => 'telon-oil-tea',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
        ,
        [
            'name' => 'Cajuput Oil Saffron',
            'slug' => 'cajuput-oil-saffron',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
        ,
        [
            'name' => 'Cajuput Oil Vanilla',
            'slug' => 'cajuput-oil-vanilla ',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
    
    
    
    
    ]);
    }
}
