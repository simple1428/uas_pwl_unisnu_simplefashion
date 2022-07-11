<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Category;
use Illuminate\Support\Str;
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
                'no_invoice' => 'SM-'.date('Y-m-d').'-'.Str::random(3),
                'status' => 'cart',
                'qty' => 1,
                'user_id' => 1,
                'total' => 50000,
                'produk_id' => 1
            ] 
            );
        Cart::create( 
            [
                'no_invoice' => 'SM-'.date('Y-m-d').'-'.Str::random(3),
                'status' => 'cart',
                'user_id' => 1,
                'qty' => 1,
                'total' => 50000,
                'produk_id' => 2
            ] 
            );
        User::create([
            'name' => 'Admin',
            'username' => 'admin123',
            'email' => 'admin@gmail.com',
            'no_hp' => '089619080300',
            'status' => '1',
            'password' => bcrypt('12345')
        ]);
        User::create([
            'name' => "User",
            'username' => 'user123',
            'email' => 'user@gmail.com',
            'no_hp' => '089619080300',
            'status' => '0',
            'password' => bcrypt('12345')
        ]);
        Order::create([
            'no_invoice' => "asdfg", 
            'user_id' => '1',
            'no_hp' => '089619080300',
            'name' => "misabahudin",  
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
    }
}