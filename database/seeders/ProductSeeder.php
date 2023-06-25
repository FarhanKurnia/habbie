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
    DB::table('products')->insert([
        [
        'name' => 'product 1',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 15000,
        'stock' => 50,
        'rating' => 5,
        'slug' => 'product-1',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 2',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 15000,
        'stock' => 50,
        'rating' => 5,
        'slug' => 'product-2',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 3',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 20000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-3',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 4',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 15000,
        'stock' => 50,
        'rating' => 5,
        'slug' => 'product-4',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 5',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 20000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-5',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 6',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 15000,
        'stock' => 50,
        'rating' => 5,
        'slug' => 'product-6',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 7',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 20000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-7',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 8',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 15000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-8',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 9',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 15000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-9',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 10',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 15000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-10',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 11',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 20000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-11',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 12',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 15000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-12',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 13',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 15000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-13',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 14',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 20000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-14',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 15',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 20000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-15',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 16',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 30000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-16',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 17',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 15000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-17',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 18',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 20000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-18',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 19',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 15000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-19',
        'discount_id' => null,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'name' => 'product 20',
        'category_id'=>1,
        'image' => 'path/image.jpg',
        'description' => 'Lorem ipsum dolor sit amet',
        'price' => 20000,
        'stock' => 50,
        'rating' => 4,
        'slug' => 'product-20',
        'discount_id' => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ]]);
    }
}
