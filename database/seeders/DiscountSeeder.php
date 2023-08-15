<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('discounts')->insert([[
            'name' => 'Discount 12',
            'rule' => 12,
            'slug' => 'discount-12',
            'status' => 'active',
            'description'=>'Kisaran Diskon 1 Botol Telon = 12% (Reguler dan acak pada produk yang terpilih untuk didiskon) SELECTED ITEM/Season bisa berubah sewaktu-waktu.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'name' => 'Discount 13%',
            'slug' => 'discount-13',
            'rule' => 13,
            'status' => 'active',
            'description'=>'Kisaran Diskon 1 Botol Cajuput Oil = 13% (Reguler dan acak pada produk yang terpilih untuk didiskon) SELECTED ITEM/Season bisa berubah sewaktu-waktu.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Discount 18%',
            'slug' => 'discount-18',
            'rule' => 18,
            'status' => 'active',
            'description'=>'Flash sale 1 Botol Telon 18% (opsional)--tanggal payday (25/28/30)//tanggal kembar (misal 1.1, 2.2,3.3, dst) SELECTED ITEM/Season bisa berubah sewaktu-waktu.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Discount 16%',
            'slug' => 'discount-16',
            'rule' => 16,
            'status' => 'active',
            'description'=>'Flash sale 1 Botol Cajuput Oil 16% (opsional)--tanggal payday (25/28/30)//tanggal kembar (misal 1.1, 2.2,3.3, dst) SELECTED ITEM/Season bisa berubah sewaktu-waktu.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]]);
    }
}
