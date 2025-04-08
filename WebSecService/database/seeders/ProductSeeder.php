<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'LG Smart TV 50"',
                'code' => 'LGTV50',
                'model' => 'LG-50-2023',
                'description' => '50-inch 4K UHD Smart TV with HDR and webOS',
                'price' => 599.99,
                'stock' => 10,
                'photo' => 'lgtv50.jpg'
            ],
            [
                'name' => 'Samsung Smart TV',
                'code' => 'TV2',
                'model' => 'SAM-TV2-2023',
                'description' => 'Premium 4K QLED TV with Smart Hub and Gaming Features',
                'price' => 799.99,
                'stock' => 8,
                'photo' => 'tv2.jpg'
            ],
            [
                'name' => 'Sony LED TV',
                'code' => 'TV3',
                'model' => 'SONY-TV3',
                'description' => 'Full HD LED TV with X-Reality PRO',
                'price' => 449.99,
                'stock' => 15,
                'photo' => 'tv3.jpg'
            ],
            [
                'name' => 'TCL Smart TV',
                'code' => 'TV4',
                'model' => 'TCL-TV4-2023',
                'description' => 'Android TV with Google Assistant and Chromecast built-in',
                'price' => 399.99,
                'stock' => 12,
                'photo' => 'tv4.jpg'
            ],
            [
                'name' => 'Samsung Smart Refrigerator',
                'code' => 'RF2',
                'model' => 'SAM-RF2-2023',
                'description' => 'Smart Fridge with Family Hub and FlexZone',
                'price' => 1299.99,
                'stock' => 5,
                'photo' => 'rf2.jpg'
            ],
            [
                'name' => 'LG French Door Refrigerator',
                'code' => 'RF3',
                'model' => 'LG-RF3',
                'description' => 'French Door Refrigerator with Door-in-Door',
                'price' => 1499.99,
                'stock' => 6,
                'photo' => 'rf3.jpg'
            ],
            [
                'name' => 'Whirlpool Side-by-Side Refrigerator',
                'code' => 'RF4',
                'model' => 'WP-RF4',
                'description' => 'Side-by-Side Refrigerator with Ice Maker',
                'price' => 999.99,
                'stock' => 8,
                'photo' => 'rf4.jpg'
            ],
            [
                'name' => 'Samsung Family Hub Refrigerator',
                'code' => 'RF5',
                'model' => 'SAM-RF5-2023',
                'description' => 'Smart Refrigerator with Family Hub Display',
                'price' => 2199.99,
                'stock' => 4,
                'photo' => 'rf5.jpg'
            ],
            [
                'name' => 'GE Profile Smart Refrigerator',
                'code' => 'RF6',
                'model' => 'GE-RF6',
                'description' => 'Counter-Depth Smart Refrigerator with WiFi',
                'price' => 1799.99,
                'stock' => 6,
                'photo' => 'rf6.jpg'
            ],
            [
                'name' => 'Samsung Top Freezer Refrigerator',
                'code' => 'TSRF50',
                'model' => 'SAM-TSRF50',
                'description' => 'Energy Star Certified Top Freezer Refrigerator',
                'price' => 799.99,
                'stock' => 10,
                'photo' => 'tsrf50.jpg'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
