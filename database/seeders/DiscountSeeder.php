<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('discounts')->insert([[
            'name' => 'Discount 20%',
            'rule' => 20,
            'slug' => 'discount-20%',
            'status' => 'active',
            'description'=>'Lorem ipsim dolor sit amet',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Discount 10%',
            'slug' => 'discount-10%',
            'rule' => 10,
            'status' => 'active',
            'description'=>'Lorem ipsim dolor sit amet',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]]);
    }
}
