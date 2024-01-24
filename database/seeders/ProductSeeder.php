<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' =>"Urun 1",
            'image' =>'images/cloth_1.jpg',
            'category_id'=>1,
            'short_text'=>"Kısabilgi",
            'price'=>100,
            'size'=>'Small',
            'color'=>'Beyaz',
            'qty'=>50,
            'status'=>'1',
            'content' => '<p>Ürün Fazla İyi, tavsiye ederiz.</p>'
        ]);

        Product::create([
            'name' =>"Urun 2",
            'image' =>'images/cloth_2.jpg',
            'category_id'=>2,
            'short_text'=>"Kısabilgi 2",
            'price'=>200,
            'size'=>'Large',
            'color'=>'Siyah',
            'qty'=>20,
            'status'=>'1',
            'content' => '<p>Ürün Fazla İyi Özellikle Rengi, tavsiye ederiz.</p>'
        ]);
    }
}
