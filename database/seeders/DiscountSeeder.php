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
            'name' => 'Discount 80%',
            'rule' => '80%',
            'description'=>'Lorem ipsim dolor sit amet',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Discount 75%',
            'rule' => '75%',
            'description'=>'Lorem ipsim dolor sit amet',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]]);
    }
}
