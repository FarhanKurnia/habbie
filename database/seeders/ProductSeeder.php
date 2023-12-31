<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('products')->insert([[
        'name' => 'Jasmine Tea',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => '15.000',
        'stock' => 50,
        'rating' => 5,
        'slug' => 'jasmine-tea',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'Flower Anggrek Bulan',
        'category_id'=>2,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => '20.000',
        'stock' => 50,
        'rating' => 4,
        'slug' => 'flower-anggrek-bulan',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ]]);
    }
}
