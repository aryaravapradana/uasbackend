<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\SubCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // KATEGORI UTAMA
        $elektronik = Categories::firstOrCreate([
            'slug' => 'elektronik'
        ], [
            'name' => 'Elektronik'
        ]);

        $kecantikan = Categories::firstOrCreate([
            'slug' => 'kecantikan'
        ], [
            'name' => 'Kecantikan'
        ]);

        $fashion = Categories::firstOrCreate([
            'slug' => 'fashion'
        ], [
            'name' => 'Fashion'
        ]);

        $rumahTangga = Categories::firstOrCreate([
            'slug' => 'rumah-tangga'
        ], [
            'name' => 'Rumah Tangga'
        ]);

        $olahraga = Categories::firstOrCreate([
            'slug' => 'olahraga'
        ], [
            'name' => 'Olahraga'
        ]);

        $hobi = Categories::firstOrCreate([
            'slug' => 'hobi'
        ], [
            'name' => 'Hobi'
        ]);

        // SUBKATEGORI ELEKTRONIK
        SubCategories::firstOrCreate([
            'slug' => 'hp'
        ], [
            'name' => 'HP',
            'category_id' => $elektronik->id
        ]);

        SubCategories::firstOrCreate([
            'slug' => 'laptop'
        ], [
            'name' => 'Laptop',
            'category_id' => $elektronik->id
        ]);

        // SUBKATEGORI KECANTIKAN
        SubCategories::firstOrCreate([
            'slug' => 'skincare'
        ], [
            'name' => 'Skincare',
            'category_id' => $kecantikan->id
        ]);
    }
}
