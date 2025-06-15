<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\SubCategory;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $hp = SubCategory::where('slug', 'hp')->first();
        $laptop = SubCategory::where('slug', 'laptop')->first();
        $printer = SubCategory::where('slug', 'printer')->first();

        // =================== H P ===================
        $hpProducts = [
            ['Samsung Galaxy A54', 4999000, 15, 'Samsung Galaxy A54 dengan layar AMOLED 6.4" dan Exynos 1380.'],
            ['iPhone 13', 12999000, 10, 'iPhone 13 dengan chip A15 Bionic dan kamera ganda 12MP.'],
            ['Xiaomi Redmi Note 12', 2399000, 20, 'Redmi Note 12 dengan layar AMOLED 120Hz dan Snapdragon 685.'],
            ['Vivo Y21s', 2199000, 30, 'Vivo Y21s dilengkapi kamera 50MP dan baterai 5000mAh.'],
            ['Infinix Zero 5G', 2799000, 25, 'Infinix Zero 5G dengan performa Dimensity 920 dan 5G ready.'],
            ['POCO X5', 2999000, 18, 'POCO X5 hadir dengan Snapdragon 695 dan layar AMOLED.'],
            ['OPPO A57', 1899000, 12, 'OPPO A57 memiliki desain stylish dan baterai tahan lama.'],
            ['Realme Narzo 50A', 1999000, 22, 'Narzo 50A dengan Helio G85 dan kamera 50MP.'],
            ['ASUS ROG Phone 6', 11999000, 5, 'Smartphone gaming ekstrem dengan Snapdragon 8+ Gen 1.'],
            ['Nokia G20', 1799000, 8, 'Nokia G20 dengan 4 kamera dan baterai 5050mAh.'],
        ];

        foreach ($hpProducts as [$name, $price, $stock, $desc]) {
            Product::create([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'subcategory_id' => $hp->id,
                'image_url' => 'https://cdn.example.com/images/hp/' . str_replace(' ', '_', strtolower($name)) . '.jpg',
                'description' => $desc,
            ]);
        }

        // =================== L A P T O P ===================
        $laptopProducts = [
            ['ASUS Vivobook 14', 7500000, 25, 'Laptop ringan dengan performa tinggi untuk kerja harian.'],
            ['HP Pavilion 15', 8600000, 20, 'Laptop multimedia dengan performa tinggi dan layar lebar.'],
            ['Lenovo IdeaPad Slim 3', 6200000, 18, 'Laptop ekonomis untuk belajar dan bekerja dari rumah.'],
            ['Dell Inspiron 14', 8400000, 15, 'Dilengkapi prosesor Intel Core i5 dan SSD 512GB.'],
            ['Acer Aspire 5', 7300000, 12, 'Laptop untuk produktivitas harian dengan RAM 8GB.'],
            ['MSI Modern 14', 9500000, 10, 'Laptop stylish dengan performa tinggi dan grafis Iris Xe.'],
            ['MacBook Air M1', 13999000, 7, 'Laptop Apple dengan chip M1 dan baterai tahan lama.'],
            ['Axioo MyBook 14F', 4299000, 14, 'Laptop lokal terjangkau untuk pelajar dan pekerja ringan.'],
            ['Asus TUF Gaming F15', 12499000, 6, 'Laptop gaming dengan GPU RTX dan refresh rate 144Hz.'],
            ['Lenovo Yoga Slim 7i', 11600000, 9, 'Ultrabook premium dengan layar IPS dan desain ramping.'],
        ];

        foreach ($laptopProducts as [$name, $price, $stock, $desc]) {
            Product::create([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'subcategory_id' => $laptop->id,
                'image_url' => 'https://images.samsung.com/is/image/samsung/p6pim/id/sm-a546elbgxid/gallery/id-galaxy-a54-5g-sm-a546elbgxid-534478479?$650_519_PNG$',
                'description' => $desc,
            ]);
        }

        // =================== P R I N T E R ===================
        $printerProducts = [
            ['Canon PIXMA G3020', 2400000, 10, 'Printer all-in-one dengan tinta isi ulang dan Wi-Fi.'],
            ['Epson L3250', 2600000, 12, 'Printer wireless EcoTank dengan efisiensi tinggi.'],
            ['HP DeskJet Ink Advantage 2336', 720000, 30, 'Printer warna murah dengan scanning dan copy.'],
            ['Brother DCP-T420W', 2350000, 11, 'Printer tangki tinta dengan koneksi Wi-Fi dan LCD.'],
            ['Canon PIXMA MG2570S', 650000, 18, 'Printer ekonomis untuk pencetakan dokumen ringan.'],
            ['Epson L121', 1699000, 16, 'Printer inkjet hemat biaya dengan hasil tajam.'],
            ['HP Smart Tank 515', 2999000, 9, 'Printer tank warna dengan layar LCD dan Wi-Fi.'],
            ['Brother HL-L2321D', 1850000, 13, 'Printer laser monokrom dengan fitur duplex.'],
            ['Canon imageCLASS LBP6030', 1300000, 14, 'Printer laser ringkas dan hemat daya.'],
            ['Epson EcoTank L1110', 1990000, 15, 'Printer inkjet dengan sistem tangki tinta hemat.'],
        ];

        foreach ($printerProducts as [$name, $price, $stock, $desc]) {
            Product::create([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'subcategory_id' => $printer->id,
                'image_url' => 'https://cdn.example.com/images/printer/' . str_replace(' ', '_', strtolower($name)) . '.jpg',
                'description' => $desc,
            ]);
        }
    }
}
