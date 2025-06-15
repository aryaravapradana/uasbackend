<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    public function run(): void
    {
        $elektronik = Category::firstOrCreate(
            ['slug' => 'elektronik'],
            ['name' => 'Elektronik']
        );

        $subcategories = [
            ['name' => 'HP', 'slug' => 'hp'],
            ['name' => 'Laptop', 'slug' => 'laptop'],
            ['name' => 'Printer', 'slug' => 'printer'],
            ['name' => 'TV', 'slug' => 'tv'],
            ['name' => 'Kulkas', 'slug' => 'kulkas'],
            ['name' => 'AC', 'slug' => 'ac'],
            ['name' => 'Mesin Cuci', 'slug' => 'mesin-cuci'],
            ['name' => 'Kamera', 'slug' => 'kamera'],
            ['name' => 'Speaker', 'slug' => 'speaker'],
            ['name' => 'Smartwatch', 'slug' => 'smartwatch'],
        ];

        foreach ($subcategories as $data) {
            SubCategory::firstOrCreate(
                ['slug' => $data['slug'], 'category_id' => $elektronik->id],
                [
                    'name' => $data['name'],
                    'category_id' => $elektronik->id,
                ]
            );
        }

        echo "Subkategori berhasil ditambahkan atau sudah ada sebelumnya.\n";
    }
}
