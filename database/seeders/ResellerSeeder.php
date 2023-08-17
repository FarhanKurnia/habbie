<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resellers')->insert([
        [
            'reseller_id' => '2007849374838378',
            'name' => 'farhan',
            'email' => 'farhan.aja@mail.com',
            'gender' => 'pria',
            'phone' => '089898889222',
            'status' => 'active',
            'birth_date' => Carbon::now()->format('Y-m-d'),
            'identity_card' => '99984897384893849',
            'address' => 'jl. damai',
            'province' => 'Yogyakarta',
            'city' => 'Bantul',
            'subdistrict' => 'Bantul',
            'postal_code' => '99898'
        ],
        [
            'reseller_id' => '2007849374838379',
            'name' => 'kurnia',
            'email' => 'farhan.doang@mail.com',
            'gender' => 'pria',
            'phone' => '089898889211',
            'status' => 'active',
            'birth_date' => Carbon::now()->format('Y-m-d'),
            'identity_card' => '999848973848938111',
            'address' => 'jl. mana',
            'province' => 'Jawa Barat',
            'city' => 'Bandung',
            'subdistrict' => 'Cieumbeluit',
            'postal_code' => '9878'
        ]
    ]);
    }
}
