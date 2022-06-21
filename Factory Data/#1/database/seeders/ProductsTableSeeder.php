<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    $products = [
        ['name' => 'banana', 'price' => 140],
        ['name' => 'banana', 'price' => 100],
        ['name' => 'banana', 'price' => 100],
        ['name' => 'banana', 'price' => 130]
    ];

    foreach($products as $product) {
        Product::create($product);
    }

    }
}
