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
            'email'=>'farhan@mail.com',
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
            'email'=>'gandhi@mail.com',
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
            'email'=>'kurnia@mail.com',
            'email_verified' => true,
            'email_verified_at' => Carbon::now(),
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
