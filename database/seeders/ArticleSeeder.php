<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([[
            'title' => 'articles 1',
            'post'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis volutpat sem quis dapibus. Vestibulum placerat leo in porta posuere. Aenean tristique orci ex, et efficitur magna maximus id.',
            'image' => 'path/image.jpg',
            'slug' => 'article-1',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'title' => 'articles 2',
            'post'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis volutpat sem quis dapibus. Vestibulum placerat leo in porta posuere. Aenean tristique orci ex, et efficitur magna maximus id.',
            'image' => 'path/image.jpg',
            'slug'=>'article-2',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'title' => 'articles 3',
            'post'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis volutpat sem quis dapibus. Vestibulum placerat leo in porta posuere. Aenean tristique orci ex, et efficitur magna maximus id.',
            'image' => 'path/image.jpg',
            'slug'=>'article-3',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'title' => 'articles 4',
            'post'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis volutpat sem quis dapibus. Vestibulum placerat leo in porta posuere. Aenean tristique orci ex, et efficitur magna maximus id.',
            'image' => 'path/image.jpg',
            'slug'=>'article-4',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'title' => 'articles 5',
            'post'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis volutpat sem quis dapibus. Vestibulum placerat leo in porta posuere. Aenean tristique orci ex, et efficitur magna maximus id.',
            'image' => 'path/image.jpg',
            'slug'=>'article-5',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'title' => 'articles 6',
            'post'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis volutpat sem quis dapibus. Vestibulum placerat leo in porta posuere. Aenean tristique orci ex, et efficitur magna maximus id.',
            'image' => 'path/image.jpg',
            'slug'=>'article-6',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]]);
    }
}
