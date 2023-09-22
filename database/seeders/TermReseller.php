<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermReseller extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('term_resellers')->insert([
            'information' => 'Untung banget loh Bie, dengan menjadi reseller, maka untuk harga product perbotol menjadi Rp 45.500. Selain itu, terdapat DISKON KHUSUS lain untuk Reseller Habbie yaitu: setiap pembelian 50-249 botol akan mendapatkan diskon sebesar 4% sehingga harga tiap product menjadi 43.700 per botol dan setiap pembelian >250 botol maka akan mendapatkan diskon sebesar 7% sehingga harga product menjadi Rp. 42.300 per botol. Harga juga sudah termasuk PPN 11% ya 😊',
            'term' => '1. Mengorder paket reseller minimal 50 botol <br> 2. Mengirimkan identitas berupa KTP &/ NPWP <br> 3. Mengisi identitas dan informasi sosial media baik toko online maupun offline',
            'slug' => 'term-reseller'
        ]);
    }
}
