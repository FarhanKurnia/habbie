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
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'image' => 'storage/img/sample-image-article-01.jpg',
            'slug' => 'article-1',
            'categories' => 'article',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'title' => 'articles 2',
            'post'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis volutpat sem quis dapibus. Vestibulum placerat leo in porta posuere. Aenean tristique orci ex, et efficitur magna maximus id.',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'image' => 'storage/img/sample-image-article-01.jpg',
            'slug'=>'article-2',
            'categories' => 'article',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'title' => 'articles 3',
            'post'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis volutpat sem quis dapibus. Vestibulum placerat leo in porta posuere. Aenean tristique orci ex, et efficitur magna maximus id.',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'image' => 'storage/img/sample-image-article-01.jpg',
            'slug'=>'article-3',
            'categories' => 'article',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'title' => 'articles 4',
            'post'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis volutpat sem quis dapibus. Vestibulum placerat leo in porta posuere. Aenean tristique orci ex, et efficitur magna maximus id.',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'image' => 'storage/img/sample-image-article-01.jpg',
            'slug'=>'article-4',
            'categories' => 'article',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'title' => 'articles 5',
            'post'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis volutpat sem quis dapibus. Vestibulum placerat leo in porta posuere. Aenean tristique orci ex, et efficitur magna maximus id.',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'image' => 'storage/img/sample-image-article-01.jpg',
            'slug'=>'article-5',
            'categories' => 'article',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'title' => 'articles 6',
            'post'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis volutpat sem quis dapibus. Vestibulum placerat leo in porta posuere. Aenean tristique orci ex, et efficitur magna maximus id.',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'image' => 'storage/img/sample-image-article-01.jpg',
            'slug'=>'article-6',
            'categories' => 'article',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'title' => 'career 1',
            'post'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis volutpat sem quis dapibus. Vestibulum placerat leo in porta posuere. Aenean tristique orci ex, et efficitur magna maximus id.',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'image' => 'storage/img/sample-image-article-01.jpg',
            'slug'=>'career-1',
            'categories' => 'career',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'title' => 'career 2',
            'post'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis volutpat sem quis dapibus. Vestibulum placerat leo in porta posuere. Aenean tristique orci ex, et efficitur magna maximus id.',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'image' => 'storage/img/sample-image-article-01.jpg',
            'slug'=>'career-2',
            'categories' => 'career',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]]);
    }
}
