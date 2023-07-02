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
            'image' => 'path/image.jpg',
            'description'=>'Lorem ipsim dolor sit amet',
            'product_id' => 20,
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Buy 3 only 60K',
            'slug' => 'buy-3-only-60k',
            'image' => 'path/image.jpg',
            'description'=>'Lorem ipsim dolor sit amet',
            'product_id' => 21,
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]]);
    }
}
