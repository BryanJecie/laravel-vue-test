<?php

namespace Database\Seeders;

use App\Domains\Products\Model\Product;
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
        $authorNames = ['Lebron james', 'Steve Nash', 'John Doe', 'Loren Ipsum'];
        $productNames = ['iPhone', 'Samsung', 'Htc', 'Motorola', 'tuf Gaming', 'Asus', 'Hp phone', 'Login tech', 'Log Mouse', 'Tea Cap'];

        foreach ($productNames as $value) {
            Product::create([
                'author_name' => $authorNames[array_rand($authorNames)],
                'product_name' => $value
            ]);
        }
    }
}
