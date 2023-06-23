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
    // ['name', 'category', 'image', 'description', 'price', 'stock', 'rating'];
    DB::table('products')->insert([[
        'name' => 'Jasmine Tea',
        'category'=>'Telon oil',
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => '15.000',
        'stock' => 50,
        'rating' => 5,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'Flower Anggrek Bulan',
        'category'=>'Telon oil',
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => '20.000',
        'stock' => 50,
        'rating' => 4,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ]]);
    }
}
