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
                'name' => 'Blus Cream Contrast',
                'category' => 'Pakaian',
                'description' => 'Blus cream dengan aksen kontras hitam yang minimalis.',
                'price' => 165000,
                'stock' => 12,
                'image' => 'Shop Cream Contrast-Trim Blouse.jpg',
            ],
            [
                'name' => 'Rok Plisket Hitam',
                'category' => 'Pakaian',
                'description' => 'Rok panjang plisket hitam dengan detail ikat pinggang.',
                'price' => 175000,
                'stock' => 20,
                'image' => null,
            ],
            [
                'name' => 'Celana Wrap Taupe',
                'category' => 'Celana',
                'description' => 'Celana wrap warna taupe dengan potongan elegan.',
                'price' => 190000,
                'stock' => 10,
                'image' => 'celana-wrap.jpg',
            ],
            [
                'name' => 'Rok Cokelat Elegan',
                'category' => 'Pakaian',
                'description' => 'Rok panjang cokelat dengan desain modern dan elegan.',
                'price' => 185000,
                'stock' => 14,
                'image' => 'rok-cokelat.jpg',
            ],
            [
                'name' => 'Heels Slingback Cream',
                'category' => 'Sepatu',
                'description' => 'Sepatu heels krem dengan aksen emas yang elegan.',
                'price' => 275000,
                'stock' => 8,
                'image' => null,
            ],
            [
                'name' => 'Sneakers Burgundy',
                'category' => 'Sepatu',
                'description' => 'Sneakers burgundy dengan aksen garis krem.',
                'price' => 320000,
                'stock' => 10,
                'image' => 'sneakers-burgundy.jpg',
            ],
            [
                'name' => 'Tas Mini Ivory',
                'category' => 'Aksesori',
                'description' => 'Tas mini ivory dengan pegangan melingkar berwarna emas.',
                'price' => 225000,
                'stock' => 7,
                'image' => 'taas-ivory.jpg',
            ],
            [
                'name' => 'Kacamata Oval Gold',
                'category' => 'Aksesori',
                'description' => 'Kacamata oval dengan bingkai emas bergaya klasik.',
                'price' => 95000,
                'stock' => 15,
                'image' => 'kacamata.jpg',
            ],
            [
                'name' => 'Tas Burgundy Elegan',
                'category' => 'Aksesori',
                'description' => 'Tas burgundy dengan desain elegan untuk berbagai acara.',
                'price' => 245000,
                'stock' => 9,
                'image' => 'tas-burgundy.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['name' => $product['name']],
                $product
            );
        }
    }
}
