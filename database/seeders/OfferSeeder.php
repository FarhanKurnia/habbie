<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('offers')->insert([[
            'name' => 'Buy 3 get 1 free',
            'slug' => 'buy-3-get-1-free',
            'image' => 'storage/img/sample-offers-01.png',
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ipsum commodo, consequat dui nec, elementum nibh. Vestibulum luctus massa magna, non vulputate justo ullamcorper quis.',
            'product_id' => 20,
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Buy 3 only 60K',
            'slug' => 'buy-3-only-60k',
            'image' => 'storage/img/sample-offers-01.png',
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ipsum commodo, consequat dui nec, elementum nibh. Vestibulum luctus massa magna, non vulputate justo ullamcorper quis.',
            'product_id' => 21,
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]]);
    }
}
