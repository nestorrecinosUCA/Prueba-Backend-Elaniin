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
        
        //New Product
        $newProduct = Product::create([
            'sku' => 'IO98765',
            'name' => 'iPhone',
            'quantity' => 10,
            'price' => 600.00,
            'description' => 'This is a cellphone from EEUU, brand Apple',
            'image' => 'Products/iphone.jpg'
        ]);
        
        //New Product
        $newProduct = Product::create([
            'sku' => 'IO98898',
            'name' => 'Mackbook Air',
            'quantity' => 5,
            'price' => 13589.00,
            'description' => 'This is a computer from EEUU, brand Apple',
            'image' => null
        ]);
        
        //New Product
        $newProduct = Product::create([
            'sku' => '8976EO90',
            'name' => 'Xiomi Redmi S9',
            'quantity' => 25,
            'price' => 275.00,
            'description' => 'This is a cellphone from Chine, brand Xiaomi',
            'image' => null
        ]);
        
        //New Product
        $newProduct = Product::create([
            'sku' => 'L908765N',
            'name' => 'Lenovo T400',
            'quantity' => 10,
            'price' => 500.00,
            'description' => 'This is a computer brand Lenovo',
            'image' => 'Products/Lenovo.jpg'
        ]);
        
        //New Product
        $newProduct = Product::create([
            'sku' => 'J898L989B',
            'name' => 'Headphones JBL',
            'quantity' => 5,
            'price' => 35.50,
            'description' => 'These are headphones brand JBL',
            'image' => null
        ]);
        
        //New Product
        $newProduct = Product::create([
            'sku' => 'S898K123R',
            'name' => 'Speaker Sony',
            'quantity' => 12,
            'price' => 135.75,
            'description' => 'These are speakers brand Sony',
            'image' => null
        ]);

    }
}
