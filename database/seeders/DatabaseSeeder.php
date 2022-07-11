<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Category;
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
        // \App\Models\User::factory(10)->create();
        Category::create([
            'name' => 'Celana pendek',
            'slug' => 'celana-pendek'
        ]);
        Category::create([
            'name' => 'Kaos pendek',
            'slug' => 'kaos-pendek'
        ]);

        Produk::create([
            'category_id' => '2',
            'name' => 'Kaos pendek greenlight',
            'slug' => 'kaos-pendek-greenlight',
            'harga'=> 50000,
            'stok' => 100,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam cumque molestias, magni ratione ipsum rem esse magnam voluptatum tempora doloremque temporibus est accusantium soluta autem recusandae quaerat consectetur error sunt.'
        ]);
        Produk::create([
            'category_id' => '1',
            'name' => 'Celana pendek chinos',
            'slug' => 'celana-pendek-chinos',
            'harga'=> 25000,
            'stok' => 100,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam cumque molestias, magni ratione ipsum rem esse magnam voluptatum tempora doloremque temporibus est accusantium soluta autem recusandae quaerat consectetur error sunt.'
        ]);

        Cart::create( 
            [
                'no_invoice' => 'asdfg',
                'status' => 'cart',
                'qty' => 1,
                'user_id' => 1,
                'total' => 50000,
                'produk_id' => 1
            ] 
            );
        Cart::create( 
            [
                'no_invoice' => 'asdfg',
                'status' => 'cart',
                'user_id' => 1,
                'qty' => 1,
                'total' => 50000,
                'produk_id' => 2
            ] 
            );
        User::create([
            'name' => 'Muhamad Misbahudin',
            'username' => 'misbah1428',
            'email' => 'misbahudin1428@gmail.com',
            'no_hp' => '089619080300',
            'status' => '1',
            'password' => bcrypt('12345')
        ]);
        User::create([
            'name' => "Ainun ni'mah",
            'username' => 'ainun1428',
            'email' => 'ainuen28@gmail.com',
            'no_hp' => '089619080300',
            'status' => '1',
            'password' => bcrypt('12345')
        ]);
        Order::create([
            'no_invoice' => "asdfg", 
            'user_id' => '1',
            'no_hp' => '089619080300',
            'name' => "Ainun ni'mah",  
            'provinsi' => "jawa tengah",  
            'kabupaten' => "jepara",  
            'kecamatan' => "donorojo",  
            'alamat' => "jepara",  
            'pembayaran' => "COD",
            'desa' => "tulakan",  
            'status' => 'pesanan-baru', 
            'ongkir' => 15000,
            'jumlah' => 50000
        ]);
        Order::create([
            'no_invoice' => "asdfg", 
            'no_hp' => '089619080300',
            'user_id' => '1',
            'name' => "Muhamad Misbahudin",  
            'provinsi' => "jawa tengah",  
            'kabupaten' => "jepara",  
            'kecamatan' => "donorojo",  
            'alamat' => "jepara",  
            'pembayaran' => "COD",  
            'desa' => "tulakan",  
            'ongkir' => 15000,
            'status' => 'pesanan-diproses',  
            'jumlah' => 100000
        ]);
        Order::create([
            'no_invoice' => "asdfg", 
            'no_hp' => '089619080300',
            'user_id' => '1',
            'name' => "Muhamad Misbahudin",  
            'provinsi' => "jawa tengah",  
            'kabupaten' => "jepara",  
            'kecamatan' => "donorojo",  
            'alamat' => "jepara",  
            'pembayaran' => "COD",  
            'desa' => "tulakan",  
            'ongkir' => 15000,
            'status' => 'pesanan-dikirim',  
            'jumlah' => 100000
        ]);
        Order::create([
            'no_invoice' => "asdfg", 
            'no_hp' => '089619080300',
            'user_id' => '1',
            'name' => "Muhamad Misbahudin",  
            'provinsi' => "jawa tengah",  
            'kabupaten' => "jepara",  
            'kecamatan' => "donorojo",  
            'alamat' => "jepara",  
            'pembayaran' => "COD",  
            'desa' => "tulakan",  
            'ongkir' => 15000,
            'status' => 'pesanan-selesai',  
            'jumlah' => 100000
        ]);
        Order::create([
            'no_invoice' => "asdfg", 
            'no_hp' => '089619080300',
            'user_id' => '1',
            'name' => "Muhamad Misbahudin",  
            'provinsi' => "jawa tengah",  
            'kabupaten' => "jepara",  
            'kecamatan' => "donorojo",  
            'desa' => "tulakan",  
            'alamat' => "jepara",  
            'pembayaran' => "COD",  
            'ongkir' => 15000,
            'status' => 'pesanan-dibatalkan',  
            'jumlah' => 100000
        ]);
    }
}