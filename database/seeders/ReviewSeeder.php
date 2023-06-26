<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([[
            'name' => 'Lauren',
            'rating' => 5,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Pevita',
            'rating' => 4,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Nayla',
            'rating' => 5,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Siti',
            'rating' => 4,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Dewi',
            'rating' => 5,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Novita',
            'rating' => 4,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Baby',
            'rating' => 5,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Lala',
            'rating' => 4,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Bella',
            'rating' => 5,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Aisyah',
            'rating' => 4,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Cici',
            'rating' => 5,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Della',
            'rating' => 4,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Amel',
            'rating' => 4,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Rindu',
            'rating' => 5,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Annisa',
            'rating' => 4,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],[
            'name' => 'Mella',
            'rating' => 5,
            'description'=>'lorem ipsum dolor sit amet',
            'user_id' => 1,
        ],

        ]);
    }
}
