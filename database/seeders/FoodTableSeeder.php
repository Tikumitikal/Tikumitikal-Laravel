<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food')->insert([
            'nama_food'=>'Rice Chicken Stuffed Cheese',
            'harga'=>'19K',
            'deskripsi'=>'Ayam katsu dengan isian keju didalamnya ditambah sauce dan salad sayur segar saat penyajian',
            'kategori'=>'food'
        ]);
    }
}
