<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Meja;
use App\Models\Product;
use App\Models\Reservasi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'nama' => 'admin',
        ]);

        Role::create([
            'nama' => 'user',
        ]);

        User::create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'no_hp' => '081111111111',
            'id_role' => 1,
        ]);

        User::create([
            'nama' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'no_hp' => '081222222222',
            'id_role' => 2,
        ]);

        Kategori::create([
            'nama' => 'Food'
        ]);

        Kategori::create([
            'nama' => 'Snack'
        ]);

        Kategori::create([
            'nama' => 'Coffee'
        ]);

        Kategori::create([
            'nama' => 'Fresh'
        ]);

        Meja::create([
            'no_meja' => '1'
        ]);

        Meja::create([
            'no_meja' => '2'
        ]);

        Meja::create([
            'no_meja' => '3'
        ]);

        Meja::create([
            'no_meja' => '4'
        ]);

        Meja::create([
            'no_meja' => '5'
        ]);

        Meja::create([
            'no_meja' => '6'
        ]);

        Meja::create([
            'no_meja' => '7'
        ]);

        Meja::create([
            'no_meja' => '8'
        ]);

        Meja::create([
            'no_meja' => '9'
        ]);

        Meja::create([
            'no_meja' => '10'
        ]);

        Product::create([
            'nama' => 'Nasi Gila',
            'image' => 'nasigila.png',
            'deskripsi' => 'Hidangan dengan komponen utama yakni sosis dan telur orak arik yang diolah dengan tambahan bumbu saus pedas gurih beserta combo nasi panas dan sayuran segar dijamin bikin ketagihan',
            'harga' => 15000,
            'id_kategori' => 1,
            'rating' => 4.9,
        ]);
        Product::create([
            'nama' => 'Chicken Matta Chilli Sauce',
            'image' => 'chickenmatta.png',
            'deskripsi' => 'Hidangan dengan komponen utama yakni ayam yang diolah menjadi ayam krispi dengan tambahan sambal mattah segar yang dijamin pedasnya nampol beserta combo nasi panas dan sayuran segar dijamin mantull',
            'harga' => 18000,
            'id_kategori' => 1,
            'rating' => 5,
        ]);
        Product::create([
            'nama' => 'Chicken Barbeque Sauce',
            'image' => 'chickenbarbeque.png',
            'deskripsi' => 'Hidangan dengan komponen utama yakni olahan ayam krispi dengan tambahan saus barbeque yang khas beserta combo nasi panas dan salad sayuran segar dijamin nikmat',
            'harga' => 18000,
            'id_kategori' => 1,
            'rating' => 4.9,
        ]);
        Product::create([
            'nama' => 'Chicken Lava Sauce ',
            'image' => 'chickenlava.png',
            'deskripsi' => 'Hidangan dengan komponen utama yakni olahan ayam krispi dengan tambahan saus lava bercitarasa pedas manis beserta combo nasi panas dan salad sayur segar dijamin nikmat',
            'harga' => 19000,
            'id_kategori' => 1,
            'rating' => 4.7,
        ]);
        Product::create([
            'nama' => 'Chicken Stuffed Cheese',
            'image' => 'chickenstuffed.png',
            'deskripsi' => 'Hidangan dengan komponen utama yakni ayam katsu berisi keju didalamnya yang disajikan dengan tambahan saus sambal yang nikmat beserta combo nasi panas dan salad sayuran segar dijamin bikin jatuh cinta',
            'harga' => 19000,
            'id_kategori' => 1,
            'rating' => 5,
        ]);
        Product::create([
            'nama' => 'Chicken Salted Egg',
            'image' => 'chickensaltedegg.png',
            'deskripsi' => 'Hidangan dengan komponen utama yakni potongan ayam krispi dengan tambahan sauce keju yang gurih krimi beserta combo nasi panas dan salad sayur segar dijamin nikmat',
            'harga' => 20000,
            'id_kategori' => 1,
            'rating' => 4.8,
        ]);
        Product::create([
            'nama' => 'Japanesse Purin',
            'image' => 'japanessepurin.png',
            'deskripsi' => 'Lembutnya pudding susu dipadukan dengan caramel yang manis dijamin bikin moodmu naik ',
            'harga' => 8000,
            'id_kategori' => 2,
            'rating' => 4.6,
        ]);
        Product::create([
            'nama' => 'Churros',
            'image' => 'churros.png',
            'deskripsi' => 'Fried cake dengan sensasi renyah diluar lembut didalam bikin nongkimu makin rileks',
            'harga' => 10000,
            'id_kategori' => 2,
            'rating' => 4.8,
        ]);
        Product::create([
            'nama' => 'French Fries',
            'image' => 'frenchfries.png',
            'deskripsi' => 'Snack Stick kentang goreng dengan cita rasa gurih, cocok buat menemani nongkimu',
            'harga' => 11000,
            'id_kategori' => 2,
            'rating' => 4.8,
        ]);
        Product::create([
            'nama' => 'Mix Potagis',
            'image' => 'mixpotagis.png',
            'deskripsi' => 'Snack yang terdiri dari Onion Ring, Nugget, Sausage dan Potato, cocok buat menemani obrolan asik bareng teman-teman',
            'harga' => 15000,
            'id_kategori' => 2,
            'rating' => 4.9,
        ]);
        Product::create([
            'nama' => 'Americano Hot',
            'image' => 'americanohot.jpg',
            'deskripsi' => 'Espresso dengan seduhan air panas menghasilkan rasa espresso yang soft dan kompleks',
            'harga' => 13000,
            'id_kategori' => 3,
            'rating' => 4.8,
        ]);
        Product::create([
            'nama' => 'Americano Ice',
            'image' => 'americanoice.jpg',
            'deskripsi' => 'Espresso dengan seduhan air dan tambahan es batu menghasilkan rasa espresso yang soft serta kompleks dengan sensasi dingin',
            'harga' => 14000,
            'id_kategori' => 3,
            'rating' => 4.8,
        ]);
        Product::create([
            'nama' => 'Sanger',
            'image' => 'sanger.jpg',
            'deskripsi' => 'Sering disebut “Bonbon Coffee” espresso dan susu kondensasi',
            'harga' => 15000,
            'id_kategori' => 3,
            'rating' => 4.9,
        ]);
        Product::create([
            'nama' => 'Coffee Latte',
            'image' => 'latte.jpg',
            'deskripsi' => 'Perpaduan antara espresso dan susu yang memiliki cita rasa soft, cocok untuk mencerahkan hari agar lebih bewarna',
            'harga' => 17000,
            'id_kategori' => 3,
            'rating' => 4.6,
        ]);
        Product::create([
            'nama' => 'Ice Coffee Milk',
            'image' => 'coffeemilk.jpg',
            'deskripsi' => 'Perpaduan ektra espresso dan susu yang memiliki cita rasa strong, memberikanmu semangat untuk menjalani aktivitas sehari-hari',
            'harga' => 17000,
            'id_kategori' => 3,
            'rating' => 4.8,
        ]);
        Product::create([
            'nama' => 'Aurora',
            'image' => 'aurora.png',
            'deskripsi' => 'Sajian minuman menyegarkan yang terbuat dari strawberry, jeruk, lemon, gula, soda',
            'harga' => 13000,
            'id_kategori' => 4,
            'rating' => 4.8,
        ]);
        Product::create([
            'nama' => 'Viola',
            'image' => 'violet.png',
            'deskripsi' => 'Sajian minuman menyegarkan yang terbuat dari rose, lemon, gula, soda',
            'harga' => 13000,
            'id_kategori' => 4,
            'rating' => 4.9,
        ]);
        Product::create([
            'nama' => 'Sunset',
            'image' => 'sunset.png',
            'deskripsi' => 'Sajian minuman menyegarkan yang terbuat dari jeruk, lemon, apel, gula, soda',
            'harga' => 13000,
            'id_kategori' => 4,
            'rating' => 4.7,
        ]);
        Product::create([
            'nama' => 'Jupiter',
            'image' => 'jupiter.png',
            'deskripsi' => 'Sajian minuman menyegarkan yang terbuat dari jeruk, strawberry, apel, gula, soda',
            'harga' => 13000,
            'id_kategori' => 4,
            'rating' => 4.8,
        ]);

        Reservasi::create([
            'id_user' => 2,
            'id_meja' => 1,
            'tanggal' => date('Y-m-d'),
            'status' => 'Menunggu Konfirmasi',
        ]);

    }
}