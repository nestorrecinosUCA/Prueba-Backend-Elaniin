<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newProduct = Product::create([
            'sku' => 'IO98765',
            'name' => 'Cellphone',
            'quantity' => 10,
            'price' => 135.89,
            'description' => 'This is a cellphone from EEUU, brand Apple',
            'image' => 'kfjdsalkjfdsakjfaw'
        ]);
    }
}
