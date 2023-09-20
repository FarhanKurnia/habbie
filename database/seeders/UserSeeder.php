<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([[
            'name' => 'Farhan',
            'email'=>'farhan@habbie.com',
            'customer_id' => '1000256436541',
            'email_verified' => true,
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password'),
            'role_id' => 1,
            'token_verification' => Str::random(128),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Gandhi',
            'customer_id' => '1000256436542',
            'email'=>'gandhi@habbie.com',
            'email_verified' => false,
            'email_verified_at' => null,
            'password' => bcrypt('password'),
            'role_id' => 1,
            'token_verification' => Str::random(128),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'kurnia',
            'customer_id' => '1000256436543',
            'email'=>'kurnia@habbie.com',
            'email_verified' => true,
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password'),
            'role_id' => 2,
            'token_verification' => Str::random(128),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'ragil',
            'customer_id' => '1000256436544',
            'email'=>'ragil@habbie.com',
            'email_verified' => true,
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password'),
            'role_id' => 2,
            'token_verification' => Str::random(128),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'syahputra',
            'customer_id' => '1000256436545',
            'email'=>'syahputra@habbie.com',
            'email_verified' => false,
            'email_verified_at' => null,
            'password' => bcrypt('password'),
            'role_id' => 2,
            'token_verification' => Str::random(128),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]
        ]);
    }
}
