<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\SubCategories;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $hp = SubCategories::where('slug', 'hp')->first();

        $data = [
            ['Samsung A54', 4999000, 15],
            ['iPhone 13', 12999000, 10],
            ['Xiaomi Redmi Note 12', 2399000, 20],
            ['Vivo Y21s', 2199000, 30],
            ['Infinix Zero 5G', 2799000, 25],
            ['POCO X5', 2999000, 18],
            ['OPPO A57', 1899000, 12],
            ['Realme Narzo 50A', 1999000, 22],
            ['ASUS ROG Phone 6', 11999000, 5],
            ['Nokia G20', 1799000, 8],
        ];

        foreach ($data as [$name, $price, $stock]) {
            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => $hp->id,
                'image_url'      => 'https://via.placeholder.com/300',
                'description'    => 'Produk HP berkualitas',
            ]);
        }
    }
}
