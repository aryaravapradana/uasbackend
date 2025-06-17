<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Ambil masing-masing subkategori
        $hp         = SubCategory::where('slug', 'hp')->first();
        $laptop     = SubCategory::where('slug', 'laptop')->first();
        $printer    = SubCategory::where('slug', 'printer')->first();
        $tv         = SubCategory::where('slug', 'tv')->first();
        $kulkas     = SubCategory::where('slug', 'kulkas')->first();
        $ac         = SubCategory::where('slug', 'ac')->first();
        $mesin_cuci = SubCategory::where('slug', 'mesin-cuci')->first();
        $kamera     = SubCategory::where('slug', 'kamera')->first();
        $speaker    = SubCategory::where('slug', 'speaker')->first();
        $smartwatch = SubCategory::where('slug', 'smartwatch')->first();

        // === HP ===
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
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/hp/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/hp/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => $hp->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Laptop ===
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
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/laptop/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/laptop/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => $laptop->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Printer ===
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
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/printer/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/printer/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => $printer->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === TV ===
        $tvProducts = [
            ['Samsung 43 UHD 4K Smart TV', 4999000, 8, 'Smart TV dengan resolusi 4K dan HDR.'],
            ['LG OLED 55 4K Smart TV', 15999000, 5, 'TV OLED premium dengan kualitas gambar terbaik.'],
            ['Sony Bravia 50 Full HD LED TV', 6999000, 10, 'TV LED dengan teknologi X-Reality PRO.'],
            ['TCL 32 HD Ready Smart TV', 2499000, 15, 'Smart TV ekonomis dengan koneksi Wi-Fi.'],
            ['Sharp Aquos 60 4K Smart TV', 10999000, 6, 'TV besar dengan teknologi AquoMotion.'],
            ['Xiaomi Mi TV P1 43', 3999000, 12, 'Smart TV dengan Android TV dan Google Assistant.'],
            ['Philips Ambilight 50 UHD Smart TV', 8999000, 7, 'TV dengan teknologi Ambilight untuk pengalaman sinematik.'],
            ['Hisense A6G Series 55 UHD Smart TV', 5499000, 9, 'Smart TV dengan Dolby Vision dan DTS Virtual:X.'],
            ['Panasonic Viera TH-43HX600', 4799000, 11, 'TV LED dengan teknologi Hexa Chroma Drive.'],
            ['Skyworth E20 Series 32 HD Smart TV', 1999000, 14, 'Smart TV ringkas untuk ruang kecil.'],
        ];
        foreach ($tvProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/tv/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/tv/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => $tv->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }
        // === Kulkas ===
        $kulkasProducts = [
            ['Samsung 2-Door Refrigerator 300L', 4999000, 10, 'Kulkas dengan teknologi Twin Cooling Plus.'],
            ['LG Top Freezer Refrigerator 260L', 3999000, 12, 'Kulkas hemat energi dengan kapasitas besar.'],
            ['Sharp 1-Door Refrigerator SJ-17S', 2499000, 15, 'Kulkas satu pintu dengan desain kompak.'],
            ['Panasonic Inverter Refrigerator NR-BX420G', 5999000, 8, 'Kulkas inverter dengan efisiensi tinggi.'],
            ['Electrolux Side by Side Refrigerator', 10999000, 5, 'Kulkas premium dengan fitur canggih.'],
            ['Toshiba Top Freezer Refrigerator GR-A22F', 3499000, 14, 'Kulkas dengan teknologi Fresh Air Ion.'],
            ['Hitachi French Door Refrigerator R-WB640P', 7999000, 6, 'Kulkas mewah dengan desain elegan.'],
            ['Midea Single Door Refrigerator HS-65LN', 1999000, 20, 'Kulkas kecil untuk ruang terbatas.'],
            ['Bosch Series 4 Bottom Freezer Refrigerator', 12999000, 4, 'Kulkas Eropa dengan kualitas terbaik.'],
            ['Whirlpool Double Door Refrigerator WDE-205 CLS', 4499000, 9, 'Kulkas dengan fitur MicroBlock untuk menjaga kesegaran makanan.'],
        ];
        foreach ($kulkasProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/kulkas/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/kulkas/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => $kulkas->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }
        // === AC ===
        $acProducts = [
            ['Daikin 1.5 PK Inverter AC', 4999000, 10, 'AC inverter hemat energi dengan pendinginan cepat.'],
            ['LG Dual Inverter AC 1 PK', 3999000, 12, 'AC dengan teknologi dual inverter untuk efisiensi tinggi.'],
            ['Sharp Plasmacluster AC 1.5 PK', 5499000, 8, 'AC dengan teknologi Plasmacluster untuk udara bersih.'],
            ['Samsung Wind-Free AC 1 PK', 4599000, 15, 'AC dengan teknologi Wind-Free untuk kenyamanan optimal.'],
            ['Panasonic Nanoe-G AC 1.5 PK', 5999000, 6, 'AC dengan teknologi Nanoe-G untuk udara segar.'],
            ['Toshiba Inverter AC RAS-10N3KCVG', 4299000, 14, 'AC inverter dengan desain elegan dan efisiensi tinggi.'],
            ['Mitsubishi Heavy Industries AC SRK20ZMA-S', 4799000, 9, 'AC premium dengan performa tinggi dan hemat energi.'],
            ['Gree Fairy Series AC GWH12QB-K3DNC2A', 3899000, 11, 'AC ekonomis dengan fitur pendinginan cepat.'],
            ['Carrier Superia Inverter AC CAI18SN4R30B', 6999000, 5, 'AC inverter dengan teknologi canggih dan desain modern.'],
            ['York YHJF18W-3S Inverter AC', 5299000, 7, 'AC inverter dengan performa handal dan harga terjangkau.'],
        ];
        foreach ($acProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/ac/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/ac/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => $ac->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }
        // === Mesin Cuci ===
        $mesinCuciProducts = [
            ['LG Front Load Washing Machine 8.5 Kg', 5999000, 10, 'Mesin cuci front load dengan teknologi 6 Motion Direct Drive.'],
            ['Samsung Top Load Washing Machine 7 Kg', 3999000, 12, 'Mesin cuci top load dengan fitur Diamond Drum.'],
            ['Sharp Semi-Automatic Washing Machine 7 Kg', 2499000, 15, 'Mesin cuci semi-otomatis dengan desain kompak.'],
            ['Panasonic Fully Automatic Washing Machine 9 Kg', 6999000, 8, 'Mesin cuci fully automatic dengan fitur Eco Aquabeat.'],
            ['Toshiba Top Load Washing Machine AW-DG1100', 3499000, 14, 'Mesin cuci top load dengan teknologi Active Wave Pulsator.'],
            ['Electrolux Front Load Washing Machine EWF7525DGWA', 8499000, 6, 'Mesin cuci front load premium dengan fitur Smart Sensor.'],
            ['Midea Twin Tub Washing Machine MT720S', 1999000, 20, 'Mesin cuci twin tub ekonomis untuk ruang kecil.'],
            ['Bosch Series 4 Front Load Washing Machine WAT24460IN', 10999000, 5, 'Mesin cuci front load Eropa dengan kualitas terbaik.'],
            ['Whirlpool Semi-Automatic Washing Machine STAINLESS STEEL TUB', 2799000, 9, 'Mesin cuci semi-otomatis dengan tabung stainless steel.'],
            ['Hitachi Fully Automatic Washing Machine SF-140XAV', 6499000, 7, 'Mesin cuci fully automatic dengan teknologi Smart Wash.'],
        ];
        foreach ($mesinCuciProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
           $ext = file_exists(public_path("images/mesin_cuci/{$slug}.jpg")) ? 'jpg' : 'jpeg';
           $img = "/images/mesin_cuci/{$slug}.{$ext}";


            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => $mesin_cuci->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }
        // === Kamera ===
        $kameraProducts = [
            ['Canon EOS 200D II Kit', 7999000, 10, 'Kamera DSLR dengan lensa kit 18-55mm.'],
            ['Nikon D3500 Kit', 7499000, 12, 'Kamera DSLR beginner dengan lensa kit 18-55mm.'],
            ['Sony Alpha A6000 Kit', 5999000, 15, 'Kamera mirrorless dengan lensa kit 16-50mm.'],
            ['Fujifilm X-T200 Kit', 8999000, 8, 'Kamera mirrorless stylish dengan lensa kit 15-45mm.'],
            ['Olympus OM-D E-M10 Mark III Kit', 10999000, 6, 'Kamera mirrorless premium dengan lensa kit.'],
            ['GoPro HERO9 Blac', 4999000, 20, 'Kamera aksi tahan air dengan resolusi 5K.'],
            ['DJI Osmo Action', 3999000, 18, 'Kamera aksi dengan dual screen dan stabilisasi RockSteady.'],
            ['Panasonic Lumix G7 Kit', 6999000, 10, 'Kamera mirrorless dengan lensa kit 14-42mm.'],
            ['Ricoh GR III', 7999000, 5, 'Kamera compact premium dengan sensor APS-C.'],
            ['Leica D-Lux 7', 19999000, 3, 'Kamera compact mewah dengan lensa Leica DC Vario-Summilux.'],
        ];
        foreach ($kameraProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/kamera/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/kamera/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => $kamera->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }
        // === Speaker ===
        $speakerProducts = [
            ['JBL Flip 5', 1499000, 20, 'Speaker portable tahan air dengan suara bass yang kuat.'],
            ['Sony SRS-XB12', 899000, 25, 'Speaker mini dengan Extra Bass dan tahan air IP67.'],
            ['Bose SoundLink Micro', 1599000, 15, 'Speaker kecil dengan suara jernih dan tahan air.'],
            ['Ultimate Ears BOOM 3', 1999000, 10, 'Speaker Bluetooth dengan suara 360 derajat dan tahan banting.'],
            ['Anker Soundcore Flare', 699000, 30, 'Speaker Bluetooth dengan lampu LED dan suara bass yang dalam.'],
            ['Marshall Emberton', 1999000, 8, 'Speaker portabel dengan desain klasik dan suara yang kaya.'],
            ['Bang & Olufsen Beosound A1', 2499000, 5, 'Speaker premium dengan suara jernih dan desain elegan.'],
            ['Edifier R980T', 899000, 18, 'Speaker bookshelf dengan suara stereo yang seimbang.'],
            ['Logitech Z623', 1299000, 12, 'Speaker sistem 2.1 dengan subwoofer untuk pengalaman audio sinematik.'],
            ['Creative Pebble Plus', 499000, 22, 'Speaker desktop kecil dengan suara yang mengesankan.'],
        ];
        foreach ($speakerProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/speaker/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/speaker/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => $speaker->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }
        // === Smartwatch ===
        $smartwatchProducts = [
            ['Apple Watch Series 7', 7499000, 10, 'Smartwatch dengan layar Always-On Retina dan fitur kesehatan lengkap.'],
            ['Samsung Galaxy Watch 4', 4999000, 12, 'Smartwatch Android dengan fitur kesehatan dan olahraga.'],
            ['Garmin Forerunner 245', 3999000, 15, 'Smartwatch untuk pelari dengan GPS dan pelacakan aktivitas.'],
            ['Fossil Gen 5E', 2999000, 20, 'Smartwatch stylish dengan Wear OS dan berbagai fitur pintar.'],
            ['Amazfit GTR 3', 2499000, 18, 'Smartwatch dengan baterai tahan lama dan berbagai mode olahraga.'],
            ['Huawei Watch GT 3', 3499000, 8, 'Smartwatch premium dengan desain elegan dan fitur kesehatan.'],
            ['Xiaomi Mi Watch Lite', 999000, 25, 'Smartwatch ekonomis dengan GPS dan pelacakan aktivitas.'],
            ['TicWatch Pro 3', 4999000, 6, 'Smartwatch dengan dual-layer display untuk efisiensi baterai.'],
            ['Withings Steel HR Sport', 1999000, 14, 'Smartwatch hybrid dengan pelacakan kesehatan yang akurat.'],
            ['Suunto Core All Black', 2999000, 9, 'Smartwatch outdoor dengan altimeter dan kompas.'],
        ];
        foreach ($smartwatchProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/smartwatch/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/smartwatch/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => $smartwatch->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }
        // Informasi selesai seeding
        $this->command->info('Seeding produk selesai! Total produk: ' . Product::count());         
    }
}