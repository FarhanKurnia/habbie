<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([[
            'name' => 'Farhan',
            'email'=>'farhan@mail.com',
        	'password' => Hash::make('rahasia'),
            'phone' => '088888888',
            'address' => 'Yogyakarta',
            'membership' => false,
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Gandhi',
            'email'=>'Gandhi@mail.com',
        	'password' => Hash::make('rahasia'),
            'phone' => '088888888',
            'address' => 'Bantul',
            'membership' => false,
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]]);
    }
}
