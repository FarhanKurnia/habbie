<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        DB::table('testimonials')->insert([[
            'name' => 'Amanda Kinasih',
            'profesi' => 'Guru',
            'lokasi' => 'Makassar',
            'image' => 'path/image.png',
            'description' => 'lorem ipsum dolor sit amet',
            'user_id' => 1,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ],
        [
            'name' => 'Laura Basuki',
            'profesi' => 'Actrees',
            'lokasi' => 'Jakarta',
            'image' => 'path/image.png',
            'description' => 'lorem ipsum dolor sit amet',
            'user_id' => 1,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ],
        [
            'name' => 'Intan Putri',
            'profesi' => 'Ibu Rumah Tangga',
            'lokasi' => 'Yogyakarta',
            'image' => 'path/image.png',
            'description' => 'lorem ipsum dolor sit amet',
            'user_id' => 1,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]]);
    }
}
