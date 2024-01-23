<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'name'=>'Iso Shop E-Ticaret',
            'content'=>'Hakkımızda yazısı burada olmalıdır.',
            'text_1_icon' =>'icon-truck',
            'text_1'=>'Ücretsiz Kargo',
            'text_1_content'=>'Ürünlerinizi ücretsiz kargo sağlar.',
            'text_2_icon'=>'icon-refresh2',
            'text_2'=>'Geri İade',
            'text_2_content'=>'30 gün içinde geri iade sağlaaycağız.',
            'text_3_icon'=>'icon-help',
            'text_3'=>'Destek',
            'text_3_content'=>'7/24 Bize ulaşabilirsiniz.',
        ]);
    }
}
