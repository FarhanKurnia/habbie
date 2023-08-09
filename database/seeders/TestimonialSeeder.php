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
            'name' => 'Dea',
            'profesi' => 'Wanita Karir',
            'lokasi' => 'Medan',
            'image' => 'storage/img/testimonial_dhea.jpeg',
            'description' => 'Aku kenal Habbie saat Minyak Telon Habbie masih 2 varian. Awalnya aku mikir variannya bakalan tetep dua. Eh ternyata makin lama makin banyak. Jujur sih Moms, sekarang koleksi ku nggak cuma make up hehe tp koleksi minyak telon juga buat si Hansel',
            'user_id' => 1,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ],
        [
            'name' => 'Hansel',
            'profesi' => 'Wanita Karir',
            'lokasi' => 'Medan',
            'image' => 'storage/img/testimonial_hansel.jpg',
            'description' => 'Aku sekarang nggak perlu pakein si Delan parfum moms, soalnya aku udah pake minyak telon Habbie. Jujur sih ini aromanya parfum hehe, tahan lama pula. Jadi beneran kombinasi yang cocok buat aku yang gasuka ribet.',
            'user_id' => 1,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ],
        [
            'name' => 'Malina',
            'profesi' => 'Ibu Rumah Tangga',
            'lokasi' => 'Bogor',
            'image' => 'storage/img/testimonial_malina.jpg',
            'description' => 'Awal aku kenal Habbie saat papa si Kayla pulang kantor bawain bingkisan buat si Kayla. Nah pas aku buka eh ternyata isinya minyak telon. tapi ini banyak banget loh sekotak isi 8 dan aromanya beda-beda. Emang sih papa si Kayla suka ngide, ngasih hadiah minyak telon hehe.',
            'user_id' => 1,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ],
        [
            'name' => 'Natia',
            'profesi' => 'Ibu Rumah Tangga',
            'lokasi' => 'Makassar',
            'image' => 'storage/img/testimonial_natia.jpg',
            'description' => 'Moms aku termasuk orang yang percaya sama terapi Ain loh. Nah dulu aku pakai daun bidara asli. Namun sekarang udah lebih praktis, sebab aku udah nemuin minyak telon yang ada daun bidaranya. Terima kasih Habbie',
            'user_id' => 1,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ],
        [
            'name' => 'Nisa',
            'profesi' => 'Ibu Rumah Tangga',
            'lokasi' => 'Makassar',
            'image' => 'storage/img/testimonial_nisa.jpg',
            'description' => 'Aku biasanya setiap sore sebelum Naya pergi ke TPQ pasti aku pakaiin minyak telon Habbie. Harapanku sih biar si Naya jadi nyaman waktu belajar di TPQ, soalnya aroma Habbie menerutku bikin mood nyaman, hangatnya pas dan nggak lengket. Terima kasih Habbie',
            'user_id' => 1,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]
    ]);
    }
}
