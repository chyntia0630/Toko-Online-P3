<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Kaos Polos Premium',
                'description' => 'Kaos katun nyaman untuk aktivitas sehari-hari.',
                'price' => 75000,
                'stock' => 20,
                'image' => null,
            ],
            [
                'name' => 'Hoodie Casual',
                'description' => 'Hoodie hangat dengan desain minimalis.',
                'price' => 150000,
                'stock' => 15,
                'image' => null,
            ],
            [
                'name' => 'Celana Jeans',
                'description' => 'Celana jeans kasual untuk berbagai gaya.',
                'price' => 175000,
                'stock' => 12,
                'image' => null,
            ],
            [
                'name' => 'Sepatu Sneakers',
                'description' => 'Sneakers ringan untuk penggunaan harian.',
                'price' => 250000,
                'stock' => 10,
                'image' => null,
            ],
            [
                'name' => 'Tas Ransel',
                'description' => 'Tas ransel praktis untuk kuliah dan bepergian.',
                'price' => 120000,
                'stock' => 18,
                'image' => null,
            ],
            [
                'name' => 'Topi Baseball',
                'description' => 'Topi kasual dengan ukuran yang nyaman.',
                'price' => 45000,
                'stock' => 25,
                'image' => null,
            ],
            [
                'name' => 'Jam Tangan Casual',
                'description' => 'Jam tangan bergaya simpel dan modern.',
                'price' => 200000,
                'stock' => 8,
                'image' => null,
            ],
            [
                'name' => 'Dompet Pria',
                'description' => 'Dompet ringkas untuk menyimpan uang dan kartu.',
                'price' => 65000,
                'stock' => 20,
                'image' => null,
            ],
            [
                'name' => 'Botol Minum',
                'description' => 'Botol minum praktis untuk aktivitas harian.',
                'price' => 35000,
                'stock' => 30,
                'image' => null,
            ],
            [
                'name' => 'Headphone Wireless',
                'description' => 'Headphone nirkabel untuk mendengarkan musik.',
                'price' => 180000,
                'stock' => 10,
                'image' => null,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
