<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryId = [1,2,3,4,5,6,7,8,9];
        $sizeList = ['L','M','S','XS','XL','XXL'];
        $colorList = ['Beyaz','Siyah','Kahverengi','Sarı','Lacivert','Mor'];

        $colorsize=$colorList[random_int(0,5)];
        $size = $sizeList[random_int(0,4)];
        return [
            'name'=>$colorsize.' '.$size.' Urun',
            'category_id'=>$categoryId[random_int(0,8)],
            'short_text'=>$categoryId[random_int(0,8)].'idli ürün',
            'price'=>random_int(10,1000),
            'size'=>$size,
            'color'=>$colorsize,
            'qty'=>1,
            'status'=>'1',
            'content'=>'Yazıları'
        ];
    }
}

// FACTORY FAKE VERİ OLUSTURMAYI SAĞLAR
