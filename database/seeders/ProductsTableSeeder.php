<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Laptop Pro X1',
                'code' => 'LPX1',
                'model' => '2024',
                'description' => 'High-performance laptop with latest processor and graphics.',
                'price' => 1299.99,
                'stock_quantity' => 10,
                'photo' => 'laptop.jpg'
            ],
            [
                'name' => 'Smartphone Ultra',
                'code' => 'SPU1',
                'model' => '2024',
                'description' => 'Latest smartphone with advanced camera and long battery life.',
                'price' => 899.99,
                'stock_quantity' => 15,
                'photo' => 'smartphone.jpg'
            ],
            [
                'name' => 'Wireless Earbuds',
                'code' => 'WEB1',
                'model' => '2024',
                'description' => 'Noise-cancelling wireless earbuds with premium sound quality.',
                'price' => 199.99,
                'stock_quantity' => 20,
                'photo' => 'earbuds.jpg'
            ],
            [
                'name' => 'Smart Watch',
                'code' => 'SW1',
                'model' => '2024',
                'description' => 'Fitness tracker and smart watch with health monitoring features.',
                'price' => 299.99,
                'stock_quantity' => 8,
                'photo' => 'watch.jpg'
            ],
            [
                'name' => 'Gaming Console',
                'code' => 'GC1',
                'model' => '2024',
                'description' => 'Next-gen gaming console with 4K gaming capabilities.',
                'price' => 499.99,
                'stock_quantity' => 5,
                'photo' => 'console.jpg'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 