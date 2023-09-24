<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodyRecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('body_recommendations')->insert([[
            'name' => 'Aromatic Telon Oil Variant Rose',
            'slug' => 'aromatic-telon-oil-variant-rose',
            'image' => 'storage/img/body_recommendations/body_recommendation_flowerseries_8.png',
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam justo enim, mattis et rutrum ut, rhoncus eu velit. Donec mollis vehicula libero vel luctus. Duis non ornare nisl. Fusce rutrum pellentesque tellus, in lacinia libero posuere eu.',
            'product_id' => 11,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Aromatic Cajuput Oil Variant Iran Saffron',
            'slug' => 'aromatic-cajuput-oil-variant-iran-saffron',
            'image' => 'storage/img/body_recommendations/body_recommendation_saffseries_7.png',
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam justo enim, mattis et rutrum ut, rhoncus eu velit. Donec mollis vehicula libero vel luctus. Duis non ornare nisl. Fusce rutrum pellentesque tellus, in lacinia libero posuere eu.',
            'product_id' => 36,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Aromatic Telon Oil Variant Tea Bouquet',
            'slug' => 'aromatic-telon-oil-variant-tea-bouquet',
            'image' => 'storage/img/body_recommendations/body_recommendation_teaseries_12.png',
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam justo enim, mattis et rutrum ut, rhoncus eu velit. Donec mollis vehicula libero vel luctus. Duis non ornare nisl. Fusce rutrum pellentesque tellus, in lacinia libero posuere eu.',
            'product_id' => 26,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Aromatic Cajuput Oil Variant Madagascar Vanilla',
            'slug' => 'aromatic-cajuput-oil-variant-madagascar-vanilla',
            'image' => 'storage/img/body_recommendations/body_recommendation_vanseries_5.png',
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam justo enim, mattis et rutrum ut, rhoncus eu velit. Donec mollis vehicula libero vel luctus. Duis non ornare nisl. Fusce rutrum pellentesque tellus, in lacinia libero posuere eu.',
            'product_id' => 40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],

    ]);
    }
}
