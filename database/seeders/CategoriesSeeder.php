<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        // KATEGORI UTAMA
        $elektronik = Category::firstOrCreate([
            'slug' => 'elektronik'
        ], [
            'name' => 'Elektronik'
        ]);

        $kecantikan = Category::firstOrCreate([
            'slug' => 'kecantikan'
        ], [
            'name' => 'Kecantikan'
        ]);

        $fashion = Category::firstOrCreate([
            'slug' => 'fashion'
        ], [
            'name' => 'Fashion'
        ]);

        $rumahTangga = Category::firstOrCreate([
            'slug' => 'rumah-tangga'
        ], [
            'name' => 'Rumah Tangga'
        ]);

        $olahraga = Category::firstOrCreate([
            'slug' => 'olahraga'
        ], [
            'name' => 'Olahraga'
        ]);

        $hobi = Category::firstOrCreate([
            'slug' => 'hobi'
        ], [
            'name' => 'Hobi'
        ]);

        // SUBKATEGORI ELEKTRONIK
        $elektronikSubs = ['HP', 'Laptop', 'Kulkas', 'TV', 'Monitor', 'Kamera', 'Headphone', 'Smartwatch', 'Speaker', 'Printer'];
        foreach ($elektronikSubs as $sub) {
            SubCategory::firstOrCreate([
                'slug' => strtolower($sub)
            ], [
                'name' => $sub,
                'category_id' => $elektronik->id
            ]);
        }

        // SUBKATEGORI KECANTIKAN
        $kecantikanSubs = ['Skincare', 'Makeup', 'Parfum', 'Sabun', 'Shampoo', 'Body Lotion', 'Lipstick', 'Masker Wajah', 'Eyebrow', 'Foundation'];
        foreach ($kecantikanSubs as $sub) {
            SubCategory::firstOrCreate([
                'slug' => strtolower(str_replace(' ', '-', $sub))
            ], [
                'name' => $sub,
                'category_id' => $kecantikan->id
            ]);
        }

        // SUBKATEGORI FASHION
        $fashionSubs = ['Baju', 'Celana', 'Sepatu', 'Jaket', 'Topi', 'Sandal', 'Kemeja', 'Dress', 'Kaos', 'Aksesoris'];
        foreach ($fashionSubs as $sub) {
            SubCategory::firstOrCreate([
                'slug' => strtolower($sub)
            ], [
                'name' => $sub,
                'category_id' => $fashion->id
            ]);
        }

        // SUBKATEGORI RUMAH TANGGA
        $rumahSubs = ['Kompor', 'Kulkas', 'Mesin Cuci', 'Dispenser', 'Meja', 'Kursi', 'Lemari', 'Lampu', 'Kipas', 'Kasur'];
        foreach ($rumahSubs as $sub) {
            SubCategory::firstOrCreate([
                'slug' => strtolower(str_replace(' ', '-', $sub))
            ], [
                'name' => $sub,
                'category_id' => $rumahTangga->id
            ]);
        }

        // SUBKATEGORI OLAHRAGA
        $olahragaSubs = ['Bola', 'Raket', 'Sepatu Olahraga', 'Matras', 'Dumbbell', 'Jersey', 'Sepeda', 'Kacamata Renang', 'Pelindung Lutut', 'Skateboard'];
        foreach ($olahragaSubs as $sub) {
            SubCategory::firstOrCreate([
                'slug' => strtolower(str_replace(' ', '-', $sub))
            ], [
                'name' => $sub,
                'category_id' => $olahraga->id
            ]);
        }

        // SUBKATEGORI HOBI
        $hobiSubs = ['Game', 'Puzzle', 'Model Kit', 'Buku', 'Alat Musik', 'Drone', 'Kamera Analog', 'Kartu Koleksi', 'Kerajinan', 'Lego'];
        foreach ($hobiSubs as $sub) {
            SubCategory::firstOrCreate([
                'slug' => strtolower(str_replace(' ', '-', $sub))
            ], [
                'name' => $sub,
                'category_id' => $hobi->id
            ]);
        }
    }
}
