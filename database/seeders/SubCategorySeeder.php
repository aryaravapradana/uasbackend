<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    public function run(): void
    {
        // KATEGORI & SUBKATEGORI ELEKTRONIK
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

        // KATEGORI & SUBKATEGORI RUMAH TANGGA
        $rumahTangga = Category::firstOrCreate(
            ['slug' => 'rumah-tangga'],
            ['name' => 'Rumah Tangga']
        );

        $rumahSubs = ['Kompor', 'Kulkas', 'Mesin Cuci', 'Dispenser', 'Meja', 'Kursi', 'Lemari', 'Lampu', 'Kipas', 'Kasur'];
        foreach ($rumahSubs as $sub) {
            SubCategory::firstOrCreate([
                'slug' => strtolower(str_replace(' ', '-', $sub))
            ], [
                'name' => $sub,
                'category_id' => $rumahTangga->id
            ]);
        }
        
        // === KATEGORI & SUBKATEGORI FASHION ===
        $fashion = Category::firstOrCreate([
            'slug' => 'fashion'
        ], [
            'name' => 'Fashion'
        ]);

        $fashionSubs = ['Baju', 'Celana', 'Sepatu', 'Jaket', 'Topi', 'Sandal', 'Kemeja', 'Dress', 'Kaos', 'Aksesoris'];
        foreach ($fashionSubs as $sub) {
            SubCategory::firstOrCreate([
                'slug' => strtolower(str_replace(' ', '-', $sub))
            ], [
                'name' => $sub,
                'category_id' => $fashion->id
            ]);
        }
        // === KATEGORI & SUBKATEGORI KECANTIKAN ===
        $kecantikan = Category::firstOrCreate(
            ['slug' => 'kecantikan'],
            ['name' => 'Kecantikan']
        );

        $kecantikanSubs = ['Skincare', 'Makeup', 'Parfum', 'Sabun', 'Shampoo', 'Body Lotion', 'Lipstick', 'Masker Wajah', 'Eyebrow', 'Foundation'];
        foreach ($kecantikanSubs as $sub) {
            SubCategory::firstOrCreate([
                'slug' => strtolower(str_replace(' ', '-', $sub))
            ], [
                'name' => $sub,
                'category_id' => $kecantikan->id
            ]);
        }

        // === KATEGORI & SUBKATEGORI HOBI ===
        $hobi = Category::firstOrCreate(
            ['slug' => 'hobi'],
            ['name' => 'Hobi']
        );
        $hobiSubs = ['Game', 'Puzzle', 'Model Kit', 'Buku', 'Alat Musik', 'Drone', 'Kamera Analog', 'Kartu Koleksi', 'Kerajinan', 'Lego'];
        foreach ($hobiSubs as $sub) {
            SubCategory::firstOrCreate([
                'slug' => strtolower(str_replace(' ', '-', $sub))
            ], [
                'name' => $sub,
                'category_id' => $hobi->id
            ]);
        }
        
        echo "Subkategori berhasil ditambahkan atau sudah ada sebelumnya.\n";
    }
}