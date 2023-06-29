<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product_Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            CustomerSeeder::class,
            ProductCategorySeeder::class,
            DiscountSeeder::class,
            ProductSeeder::class,
            ArticleSeeder::class,
            OfferSeeder::class,
            TestimonialSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
