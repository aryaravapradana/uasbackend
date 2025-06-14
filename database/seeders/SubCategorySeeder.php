<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;
use App\Models\SubCategories;

class SubCategorySeeder extends Seeder
{
    public function run(): void
    {
        // Cari atau buat kategori 'Elektronik'
        $elektronik = Categories::firstOrCreate(
            ['name' => 'Elektronik'],
            ['slug' => 'elektronik']
        );

        // Cek apakah sudah ada subkategori-nya
        $existing = SubCategories::where('category_id', $elektronik->id)
            ->whereIn('slug', ['hp', 'laptop'])
            ->pluck('slug')
            ->toArray();

        $data = [];

        if (!in_array('hp', $existing)) {
            $data[] = [
                'category_id' => $elektronik->id,
                'name' => 'HP',
                'slug' => 'hp',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        if (!in_array('laptop', $existing)) {
            $data[] = [
                'category_id' => $elektronik->id,
                'name' => 'Laptop',
                'slug' => 'laptop',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        if (!empty($data)) {
            SubCategories::insert($data);
            echo "Subkategori baru berhasil ditambahkan: " . implode(', ', array_column($data, 'name')) . "\n";
        } else {
            echo "Semua subkategori sudah ada. Tidak ada data baru ditambahkan.\n";
        }
    }
}
