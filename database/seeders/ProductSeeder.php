<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_name' => 'Jam Tangan',
            'desc' => 'Jam tangan dari swedia',
            'stock' => '4',
            'image' => 'https://unsplash.com/photos/silver-and-black-analog-watch-fgCnYUwK_E8',
            'prices' => '250000',
            'category_id'=>"1",
        ]);
        Product::create([
            'product_name' => 'Laptop ROG',
            'desc' => 'Core i7-12700H RTX 4070',
            'stock' => '4',
            'image' => 'https://unsplash.com/photos/a-close-up-of-a-person-on-a-laptop-tkSqiW0qFJU',
            'prices' => '25000000',
            'category_id'=>"1",
        ]);
        Product::create([
            'product_name' => 'RTX 2090',
            'desc' => '24GB VRAM',
            'stock' => '4',
            'image' => 'https://unsplash.com/photos/black-fan-device-close-up-photography-u03OCRlSd2M',
            'prices' => '9000000',
            'category_id'=>"1",
        ]);
        Product::create([
            'product_name' => 'Corsair AIO',
            'desc' => '240mm fan',
            'stock' => '4',
            'image' => 'https://unsplash.com/photos/black-and-blue-computer-tower-EOAKUQcsFIU',
            'prices' => '2500000',
            'category_id'=>"1",
        ]);
    }
}
