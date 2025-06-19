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
        $hp              = SubCategory::where('slug', 'hp')->first();
        $laptop          = SubCategory::where('slug', 'laptop')->first();
        $printer         = SubCategory::where('slug', 'printer')->first();
        $tv              = SubCategory::where('slug', 'tv')->first();
        $kulkas          = SubCategory::where('slug', 'kulkas')->first();
        $ac              = SubCategory::where('slug', 'ac')->first();
        $mesin_cuci      = SubCategory::where('slug', 'mesin-cuci')->first();
        $kamera          = SubCategory::where('slug', 'kamera')->first();
        $speaker         = SubCategory::where('slug', 'speaker')->first();
        $smartwatch      = SubCategory::where('slug', 'smartwatch')->first();
        $kompor          = SubCategory::where('slug', 'kompor')->first();
        $dispenser       = SubCategory::where('slug', 'dispenser')->first();
        $meja            = SubCategory::where('slug', 'meja')->first();
        $kursi           = SubCategory::where('slug', 'kursi')->first();
        $lemari          = SubCategory::where('slug', 'lemari')->first();
        $lampu           = SubCategory::where('slug', 'lampu')->first();
        $kipas           = SubCategory::where('slug', 'kipas')->first();
        $kasur           = SubCategory::where('slug', 'kasur')->first();
        $baju            = SubCategory::where('slug', 'baju')->first();
        $celana          = SubCategory::where('slug', 'celana')->first();
        $sepatu          = SubCategory::where('slug', 'sepatu')->first();
        $jaket           = SubCategory::where('slug', 'jaket')->first();
        $topi            = SubCategory::where('slug', 'topi')->first();
        $sandal          = SubCategory::where('slug', 'sandal')->first();
        $kemeja          = SubCategory::where('slug', 'kemeja')->first();
        $dress           = SubCategory::where('slug', 'dress')->first();
        $kaos            = SubCategory::where('slug', 'kaos')->first();
        $aksesoris       = SubCategory::where('slug', 'aksesoris')->first();
        $skincare        = SubCategory::where('slug', 'skincare')->first();
        $makeup          = SubCategory::where('slug', 'makeup')->first();
        $parfum          = SubCategory::where('slug', 'parfum')->first();
        $sabun           = SubCategory::where('slug', 'sabun')->first();
        $shampoo         = SubCategory::where('slug', 'shampoo')->first();
        $body_lotion     = SubCategory::where('slug', 'body-lotion')->first();
        $lipstick        = SubCategory::where('slug', 'lipstick')->first();
        $masker_wajah    = SubCategory::where('slug', 'masker-wajah')->first();
        $eyebrow         = SubCategory::where('slug', 'eyebrow')->first();
        $foundation      = SubCategory::where('slug', 'foundation')->first();
        $game            = SubCategory::where('slug', 'game')->first();
        $puzzle          = SubCategory::where('slug', 'puzzle')->first();
        $model_kit       = SubCategory::where('slug', 'model-kit')->first();
        $buku            = SubCategory::where('slug', 'buku')->first();
        $alat_musik      = SubCategory::where('slug', 'alat-musik')->first();
        $drone           = SubCategory::where('slug', 'drone')->first();
        $kamera_analog   = SubCategory::where('slug', 'kamera-analog')->first();
        $kartu_koleksi   = SubCategory::where('slug', 'kartu-koleksi')->first();
        $kerajinan       = SubCategory::where('slug', 'kerajinan')->first();
        $lego            = SubCategory::where('slug', 'lego')->first();
        $bola            = SubCategory::where('slug', 'bola')->first();
        $raket           = SubCategory::where('slug', 'raket')->first();
        $sepatu_olahraga = SubCategory::where('slug', 'sepatu-olahraga')->first();
        $matras          = SubCategory::where('slug', 'matras')->first();
        $dumbbell        = SubCategory::where('slug', 'dumbbell')->first();
        $jersey          = SubCategory::where('slug', 'jersey')->first();
        $sepeda          = SubCategory::where('slug', 'sepeda')->first();
        $kacamata_renang = SubCategory::where('slug', 'kacamata-renang')->first();
        $pelindung_lutut = SubCategory::where('slug', 'pelindung-lutut')->first();
        $skateboard      = SubCategory::where('slug', 'skateboard')->first();


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
            $ext  = file_exists(public_path("images/elektronik/hp/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/elektronik/hp/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($hp)->id,
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
            $ext  = file_exists(public_path("images/elektronik/laptop/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/elektronik/laptop/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($laptop)->id,
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
            $ext  = file_exists(public_path("images/elektronik/printer/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/elektronik/printer/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($printer)->id,
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
            $ext  = file_exists(public_path("images/elektronik/tv/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/elektronik/tv/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($tv)->id,
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
            $ext  = file_exists(public_path("images/elektronik/kulkas/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/elektronik/kulkas/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($kulkas)->id,
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
            $ext  = file_exists(public_path("images/elektronik/ac/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/elektronik/ac/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional(value: $ac)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }
        // === Mesin Cuci ===
        $mesinCuciProducts = [
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
           $ext = file_exists(public_path("images/elektronik/mesin-cuci/{$slug}.jpg")) ? 'jpg' : 'jpeg';
           $img = "/images/elektronik/mesin-cuci/{$slug}.{$ext}";


            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($mesin_cuci)->id,
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
            $ext  = file_exists(public_path("images/elektronik/kamera/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/elektronik/kamera/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($kamera)->id,
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
            $ext  = file_exists(public_path("images/elektronik/speaker/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/elektronik/speaker/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($speaker)->id,
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
            $ext  = file_exists(public_path("images/elektronik/smartwatch/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/elektronik/smartwatch/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($smartwatch)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }
        // === Kompor ===
        $komporProducts = [
            ['Rinnai Kompor Gas 2 Tungku RI-522C', 350000, 40, 'Kompor gas dua tungku dengan api ekonomis dan body stainless steel.'],
            ['Miyako Kompor Gas 1 Tungku KG-101C', 150000, 50, 'Kompor gas portabel, cocok untuk anak kost atau traveling.'],
            ['Cosmos Kompor Gas Portable CGC-121 P', 250000, 35, 'Kompor portable dengan koper, mudah dibawa dan aman digunakan.'],
            ['Winn Gas Kompor Kaca 2 Tungku', 600000, 25, 'Kompor tanam dengan desain kaca mewah dan mudah dibersihkan.'],
            ['Quantum Kompor Gas 1 Tungku QGC-101R', 180000, 45, 'Kompor gas dengan efisiensi tinggi dan pemantik otomatis.'],
            ['Hock Kompor Minyak Tanah Mutiara 10 Sumbu', 220000, 30, 'Kompor minyak tanah klasik yang awet dan tahan lama.'],
            ['Progas Kompor Portabel 2 in 1', 210000, 28, 'Bisa menggunakan gas kaleng maupun tabung LPG 3kg.'],
            ['Sanken Kompor Gas 2 Tungku SG-369DX2', 550000, 22, 'Kompor dengan Blue Whirljet Flame untuk masakan cepat matang.'],
            ['Idealife Kompor Induksi Listrik IL-201', 450000, 18, 'Kompor listrik induksi hemat daya dengan panel digital.'],
            ['Oxone Kompor Listrik Single Stove OX-655D', 300000, 33, 'Kompor listrik satu tungku yang praktis dan minimalis.'],
        ];
        foreach ($komporProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/rumah tangga/kompor/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/rumah tangga/kompor/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($kompor)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

// === Dispenser ===
        if ($dispenser) {
            $products = [
                ['Miyako Dispenser Panas & Normal WD-190', 200000, 50, 'Dispenser meja dengan 2 fungsi, panas dan normal, desain minimalis.'],
                ['Sanken Dispenser Galon Bawah HWD-C520IC', 2100000, 20, 'Dispenser galon bawah dengan 3 kran (panas, dingin, normal) dan tangki stainless.'],
                ['Sharp Dispenser Galon Atas SWD-72EHL', 1500000, 25, 'Dispenser dengan fitur Child Lock dan lampu LED indikator.'],
                ['Cosmos Dispenser Portable CWD-1138', 180000, 60, 'Dispenser meja portabel, ringan dan mudah dipindah, hemat listrik.'],
                ['Denpoo Dispenser Galon Bawah DDB-29', 1800000, 18, 'Dispenser low watt dengan pipa Z-pipe stainless steel anti karat.'],
                ['Arisa Dispenser 3 in 1 BWD-1L', 1300000, 22, 'Dispenser galon bawah dengan fungsi panas, dingin, dan normal.'],
                ['Yong Ma Magic Clean Dispenser YM2000', 900000, 30, 'Dispenser dengan teknologi magic clean untuk kebersihan air.'],
                ['Modena Dispenser Galon Bawah DD 7302 L', 2500000, 15, 'Dispenser premium dengan fitur Water Storage Sensor.'],
                ['Mito Dispenser Galon Bawah MD-666', 1600000, 28, 'Dispenser 3 kran dengan daya listrik rendah dan kunci pengaman anak.'],
            ];
            foreach ($products as [$name, $price, $stock, $desc]) {
                $slug = Str::slug($name);
                $ext  = file_exists(public_path("images/rumah tangga/dispenser/{$slug}.jpg")) ? 'jpg' : 'jpeg';
                $img  = "/images/rumah tangga/dispenser/{$slug}.{$ext}";

                Product::create([
                    'name'           => $name,
                    'price'          => $price,
                    'stock'          => $stock,
                    'subcategory_id' => $dispenser->id,
                    'image_url'      => $img,
                    'description'    => $desc,
                ]);
            }
        }
        
// === Meja ===
        $mejaProducts = [
            ['Informa Meja Kerja Minimalis', 1200000, 20, 'Meja kerja dengan desain modern dan laci penyimpanan.'],
            ['IKEA LINNMON / ADILS Meja Tulis', 499000, 60, 'Meja tulis simpel dan fungsional dari IKEA.'],
            ['Zyo Meja Makan Kayu 4 Kursi', 2500000, 15, 'Set meja makan untuk keluarga kecil.'],
            ['Olympic Meja Belajar Anak', 750000, 30, 'Meja belajar dengan karakter dan rak buku.'],
            ['Pira Meja Komputer Gaming', 1500000, 22, 'Meja gaming dengan manajemen kabel dan permukaan luas.'],
            ['Napolly Meja Teras Plastik', 150000, 50, 'Meja plastik untuk teras atau taman, tahan cuaca.'],
            ['Activ Furniture Meja Rias', 890000, 18, 'Meja rias dengan cermin dan laci penyimpanan kosmetik.'],
            ['Graver Meja TV Minimalis', 650000, 28, 'Rak TV dengan desain modern untuk ruang keluarga.'],
            ['Livien Meja Kopi Scandinavian', 550000, 25, 'Meja tamu dengan gaya scandinavian yang estetik.'],
            ['Pro Design Meja Sudut', 400000, 35, 'Meja kecil untuk diletakkan di sudut ruangan.'],
        ];
        foreach ($mejaProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/rumah tangga/meja/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/rumah tangga/meja/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional(value: $meja)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

// === Kursi ===
        $kursiProducts = [
            ['Informa Kursi Kantor Ergonomis', 950000, 30, 'Kursi kerja dengan sandaran punggung yang nyaman.'],
            ['Napolly Kursi Plastik Santai 209', 50000, 100, 'Kursi plastik tahan lama untuk berbagai keperluan.'],
            ['Pira Kursi Gaming Profesional', 1800000, 18, 'Kursi gaming dengan bantalan dan sandaran tangan adjustable.'],
            ['IKEA POÄNG Kursi Santai', 1295000, 20, 'Kursi santai ikonik dengan rangka kayu lentur.'],
            ['Chitose Kursi Lipat', 250000, 50, 'Kursi lipat praktis untuk acara atau ruang terbatas.'],
            ['Olymplast Kursi Bakso Plastik', 35000, 150, 'Kursi bakso standar yang kuat dan ekonomis.'],
            ['Ace Hardware Kursi Teras Besi', 450000, 25, 'Satu set kursi teras dari besi tempa yang kokoh.'],
            ['Livien Kursi Makan Scandinavian', 400000, 40, 'Kursi makan kayu dengan desain minimalis.'],
            ['Stool Bar / Kursi Bar', 350000, 30, 'Kursi tinggi untuk meja bar atau pantry.'],
            ['Bean Bag Cover Only', 200000, 60, 'Sarung bean bag berbagai warna dan bahan.'],
        ];

        foreach ($kursiProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/rumah tangga/kursi/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/rumah tangga/kursi/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($kursi)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Lemari ===
        $lemariProducts = [
            ['Olympic Lemari Pakaian 2 Pintu', 1500000, 20, 'Lemari baju dengan cermin dan kunci.'],
            ['Napolly Lemari Plastik 4 Susun', 450000, 40, 'Lemari plastik serbaguna dengan karakter.'],
            ['Pira Lemari Pakaian Sliding', 2800000, 15, 'Lemari pakaian pintu geser, hemat tempat.'],
            ['IKEA BRIMNES Lemari 3 Pintu', 3500000, 12, 'Lemari modern dengan banyak ruang penyimpanan.'],
            ['Activ Furniture Rak Buku 5 Susun', 600000, 30, 'Rak buku kayu partikel dengan desain minimalis.'],
            ['Kéa Panel Lemari Dapur Atas', 800000, 25, 'Kabinet gantung untuk dapur.'],
            ['Rak Piring Stainless 3 Susun', 250000, 50, 'Rak pengering piring anti karat.'],
            ['Locker Besi 9 Pintu', 2200000, 10, 'Loker penyimpanan dari besi untuk kantor atau gym.'],
            ['Sun-Life Lemari Rotan Sintetis', 550000, 28, 'Lemari laci plastik dengan motif anyaman rotan.'],
            ['Olymplast Lemari Gantung Plastik', 750000, 22, 'Lemari plastik dengan area gantungan baju.'],
        ];
        foreach ($lemariProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/rumah tangga/lemari/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/rumah tangga/lemari/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($lemari)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Lampu ===
        $lampuProducts = [
            ['Philips Lampu LED Bohlam 12W', 35000, 200, 'Bohlam LED hemat energi, cahaya putih terang.'],
            ['Hannochs Lampu Emergency LED', 150000, 80, 'Lampu darurat yang menyala otomatis saat listrik padam.'],
            ['IKEA TERTIAL Lampu Kerja', 299000, 50, 'Lampu meja arsitek yang fleksibel dan ikonik.'],
            ['Lampu Gantung Hias Kristal', 800000, 15, 'Lampu gantung mewah untuk ruang tamu.'],
            ['Lampu Sorot LED Outdoor 50W', 120000, 60, 'Lampu tembak tahan air untuk taman atau papan nama.'],
            ['Lampu Tumblr / Hias Natal 10 Meter', 25000, 150, 'Lampu hias kelap-kelip berbagai warna.'],
            ['Downlight LED Panel 18W', 55000, 100, 'Lampu plafon tanam (inbow) untuk interior modern.'],
            ['Lampu Dinding Minimalis Outdoor', 180000, 40, 'Lampu tempel dinding untuk teras.'],
            ['Osram Lampu LED Mobil H4', 250000, 30, 'Bohlam lampu utama mobil dengan cahaya lebih terang.'],
            ['Lampu Belajar Jepit', 75000, 70, 'Lampu baca yang bisa dijepit di meja atau kepala tempat tidur.'],
        ];
        foreach ($lampuProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/rumah tangga/lampu/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/rumah tangga/lampu/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($lampu)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

// === Kipas ===
        $kipasProducts = [
            ['Miyako Kipas Angin Berdiri 16 inci', 250000, 50, 'Kipas angin berdiri dengan 3 pilihan kecepatan.'],
            ['Cosmos Kipas Angin Dinding 16 inci', 280000, 40, 'Kipas angin tempel dinding dengan tali tarikan.'],
            ['Maspion Kipas Angin Meja 8 inci', 150000, 60, 'Kipas angin kecil untuk diletakkan di atas meja.'],
            ['Sekai Kipas Angin Box Fan 12 inci', 220000, 35, 'Kipas angin kotak yang bisa diletakkan di lantai atau meja.'],
            ['Panasonic Kipas Angin Plafon', 900000, 20, 'Kipas angin gantung di plafon dengan baling-baling besi.'],
            ['Regency Kipas Angin Tornado', 550000, 25, 'Kipas angin lantai dengan hembusan angin kencang.'],
            ['Kirin Kipas Angin 3 in 1', 350000, 30, 'Bisa menjadi kipas berdiri, meja, dan dinding.'],
            ['Advance Kipas Angin Portable USB', 80000, 80, 'Kipas angin mini dengan baterai isi ulang via USB.'],
            ['Krisbow Kipas Angin Industri', 1200000, 15, 'Kipas angin besar untuk gudang atau area industri.'],
                        ['Sharp Kipas Angin Air Cooler', 1500000, 18, 'Pendingin udara dengan teknologi water tank.'],
        ];
        foreach ($kipasProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/rumah tangga/kipas/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/rumah tangga/kipas/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($kipas)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

// === Kasur ===
        $kasurProducts = [
            ['Inoac Kasur Busa No. 2 (160x200)', 1200000, 20, 'Kasur busa kepadatan tinggi dengan garansi anti kempes.'],
            ['Royal Foam Kasur Busa Single (90x200)', 700000, 30, 'Kasur busa ekonomis untuk satu orang.'],
            ['Central Spring Bed Deluxe 160x200', 2500000, 15, 'Set spring bed lengkap dengan divan dan sandaran.'],
            ['Elite Spring Bed Serenity 180x200', 3200000, 12, 'Spring bed dengan teknologi pegas dan lapisan nyaman.'],
            ['Bigland Kasur Spring Bed 2in1', 2800000, 18, 'Kasur sorong 2in1 cocok untuk kamar anak.'],
            ['Kasur Lipat Busa', 300000, 50, 'Kasur busa praktis yang bisa dilipat untuk disimpan.'],
            ['Guhdo Spring Bed New Prima 120x200', 1800000, 25, 'Spring bed dengan harga terjangkau dan kualitas baik.'],
            ['Uniland Kasur Busa Paradise', 900000, 28, 'Kasur busa dengan kain knitting yang lembut.'],
            ['Airland Spring Bed 101', 4500000, 10, 'Spring bed premium dengan 5 zona penyangga tubuh.'],
            ['Comforta Spring Bed Super Fit', 2200000, 22, 'Kasur spring bed dengan lapisan couple comfort.'],
        ];
        foreach ($kasurProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/rumah tangga/kasur/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/rumah tangga/kasur/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($kasur)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

// === Baju ===
        $bajuProducts = [
            ['Baju Cewek Cina Nuansa Merah', 185000, 45, 'Atasan wanita elegan dengan sentuhan tradisional Cina berwarna merah cerah.'],
            ['Baju Cewek Mini Kotak Kotak Pink', 95000, 70, 'Dress mini kasual motif kotak-kotak pink, cocok untuk gaya muda.'],
            ['Baju Cewek Pakaian Adat', 450000, 15, 'Set pakaian adat untuk wanita.'],
            ['Baju Cewek Stylish Berkerah Abu Abu', 130000, 60, 'Kemeja wanita berkerah warna abu-abu, cocok untuk tampilan formal maupun semi-formal.'],
            ['Baju Cowok Cina Nuansa Merah', 210000, 35, 'Kemeja pria bergaya Cina dengan detail klasik dan warna merah menyala.'],
            ['Baju Cowok Pakaian Adat', 550000, 10, 'Set pakaian adat untuk pria.'],
            ['Baju Cowok Stylish Modern', 160000, 55, 'Atasan pria stylish dengan tampilan modern.'],
            ['Sweatshirt Biru Muda', 175000, 80, 'Sweatshirt warna biru muda.'],
            ['Sweatshirt Coklat', 165000, 90, 'Sweatshirt warna coklat.'],
            ['Sweatshirt Merah', 180000, 75, 'Sweatshirt warna merah.'],
        ];
        foreach ($bajuProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/fashion/baju/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/fashion/baju/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($baju)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

// === Celana ===
        $celanaProducts = [
            ['Celana Pendek Biru Terang', 85000, 70, 'Celana pendek pria warna biru terang, ringan dan nyaman untuk santai.'],
            ['Celana Pendek Jeans Modern', 120000, 55, 'Celana pendek jeans dengan desain modern, cocok untuk gaya kasual.'],
            ['Celana Pendek Kuning', 75000, 85, 'Celana pendek cerah warna kuning, ideal untuk musim panas.'],
            ['Celana Pendek Merah', 80000, 65, 'Celana pendek pria warna merah, cocok untuk aktivitas sporty.'],
            ['Jeans Abu Abu', 190000, 40, 'Celana jeans panjang warna abu-abu, serbaguna untuk berbagai gaya.'],
            ['Jeans Biru Tua', 210000, 50, 'Celana jeans klasik warna biru tua, tahan lama dan nyaman.'],
            ['Jeans Hijau', 200000, 30, 'Celana jeans unik warna hijau, menambah sentuhan warna pada penampilan.'],
            ['Jeans Hitam', 220000, 60, 'Celana jeans hitam basic, esensial untuk setiap lemari pakaian.'],
            ['Jeans Kuning', 195000, 25, 'Celana jeans cerah warna kuning, pernyataan gaya yang berani.'],
            ['Jeans Merah', 205000, 28, 'Celana jeans warna merah yang mencolok, cocok untuk tampilan edgy.'],
        ];
        foreach ($celanaProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/fashion/celana/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/fashion/celana/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($celana)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

// === Sepatu ===
        $sepatuProducts = [
            ['Heels Hitam', 250000, 30, 'Sepatu heels klasik warna hitam, cocok untuk acara formal.'],
            ['Heels Hitam Bertali', 280000, 25, 'Sepatu heels hitam dengan detail tali, memberikan kesan elegan.'],
            ['Heels Putih', 270000, 28, 'Sepatu heels warna putih bersih, ideal untuk tampilan feminin.'],
            ['Sepatu Biru', 350000, 40, 'Sepatu olahraga warna biru, ringan dan nyaman untuk aktivitas sehari-hari.'],
            ['Sepatu Coklat', 220000, 50, 'Sepatu kasual warna coklat, cocok untuk gaya santai.'],
            ['Sepatu Hijau', 190000, 35, 'Sepatu sneakers warna hijau, memberikan sentuhan warna yang menarik.'],
            ['Sepatu Hitam', 210000, 60, 'Sepatu sneakers hitam, serbaguna dan mudah dipadukan dengan berbagai outfit.'],
            ['Sepatu Kuning', 230000, 45, 'Sepatu sneakers cerah warna kuning, tampil beda dan stylish.'],
            ['Sepatu Merah', 200000, 55, 'Sepatu sneakers merah, cocok untuk gaya yang berani dan energik.'],
            ['Sepatu Pink', 180000, 65, 'Sepatu olahraga warna pink, ringan dan modis untuk wanita.'],
            ['Sepatu Putih', 240000, 70, 'Sepatu sneakers putih klasik, wajib punya untuk setiap gaya.'],
        ];
        foreach ($sepatuProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/fashion/sepatu/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/fashion/sepatu/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($sepatu)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Jaket ===
        $jaketProducts = [
            ['Hoodie Biru', 190000, 50, 'Hoodie nyaman berwarna biru, cocok untuk gaya santai sehari-hari.'],
            ['Hoodie Coklat', 185000, 55, 'Hoodie hangat berwarna coklat, ideal untuk cuaca dingin.'],
            ['Hoodie Galaxy', 220000, 30, 'Hoodie dengan motif galaksi unik, tampilan yang menarik dan berbeda.'],
            ['Hoodie Hijau', 195000, 48, 'Hoodie kasual berwarna hijau, memberikan kesan segar dan alami.'],
            ['Hoodie Hitam', 200000, 60, 'Hoodie klasik berwarna hitam, serbaguna dan mudah dipadukan.'],
            ['Hoodie Merah', 198000, 40, 'Hoodie cerah berwarna merah, tampil berani dan energik.'],
            ['Hoodie Pink', 180000, 52, 'Hoodie lembut berwarna pink, cocok untuk gaya feminin yang nyaman.'],
            ['Hoodie Putih', 192000, 58, 'Hoodie bersih berwarna putih, tampilan minimalis dan stylish.'],
            ['Jaket Motor', 350000, 25, 'Jaket motor yang kuat dan stylish, memberikan perlindungan saat berkendara.'],
            ['Jaket Stylish Modern', 380000, 20, 'Jaket dengan desain modern dan stylish, cocok untuk berbagai acara.'],
        ];
        foreach ($jaketProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/fashion/jaket/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/fashion/jaket/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($jaket)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Topi ===
        $topiProducts = [
            ['Topi Bertali Hitam', 75000, 70, 'Topi hitam dengan tali pengikat, cocok untuk kegiatan outdoor.'],
            ['Topi Bulat Coklat', 65000, 80, 'Topi bulat berwarna coklat, gaya kasual dan nyaman.'],
            ['Topi Casual Hitam', 80000, 90, 'Topi kasual hitam, desain sederhana dan cocok untuk sehari-hari.'],
            ['Topi Cow Boy', 120000, 30, 'Topi cow-boy klasik, memberikan kesan petualang yang unik.'],
            ['Topi Detective', 95000, 40, 'Topi gaya detektif, sentuhan misterius dan klasik.'],
            ['Topi Komando', 70000, 60, 'Topi komando, desain tangguh dan fungsional.'],
            ['Topi Matahari Biru Terang', 55000, 100, 'Topi matahari warna biru terang, melindungi dari sinar matahari dengan gaya.'],
            ['Topi Pramuka', 45000, 120, 'Topi pramuka, identitas resmi dan cocok untuk kegiatan kepramukaan.'],
            ['Topi Sd', 35000, 150, 'Topi seragam sekolah dasar, nyaman untuk anak-anak.'],
            ['Topi Stylish Hitam', 85000, 75, 'Topi stylish berwarna hitam, menambah kesan modern pada penampilan.'],
        ];

        foreach ($topiProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/fashion/topi/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/fashion/topi/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($topi)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Sandal ===
        $sandalProducts = [
            ['Sandal Camper', 180000, 40, 'Sandal camper pria/wanita, nyaman untuk kegiatan outdoor dan kasual.'],
            ['Sandal Jepit Bercorak', 45000, 90, 'Sandal jepit dengan motif bercorak, ringan dan cocok untuk santai.'],
            ['Sandal Jepit Hijau', 35000, 120, 'Sandal jepit polos warna hijau, basic dan fungsional.'],
            ['Sandal Jepit Pink', 38000, 110, 'Sandal jepit warna pink cerah, cocok untuk tampilan yang playful.'],
            ['Sandal Jepit Putih Biru', 40000, 100, 'Sandal jepit kombinasi warna putih dan biru, desain klasik dan nyaman.'],
            ['Sandal Nike', 250000, 30, 'Sandal slide Nike, sporty dan nyaman untuk setelah berolahraga atau santai.'],
            ['Sandal Stylish Bunga', 150000, 50, 'Sandal stylish dengan detail bunga, memberikan sentuhan feminin dan elegan.'],
            ['Sandal Track Eagle', 190000, 35, 'Sandal track dengan desain tangguh, ideal untuk petualangan dan kegiatan outdoor.'],
            ['Sandal Wanita Kondangan', 220000, 25, 'Sandal wanita elegan, cocok untuk acara formal atau kondangan.'],
            ['Slipper Hitam', 60000, 80, 'Slipper hitam yang nyaman, ideal untuk penggunaan di dalam rumah.'],
        ];
        foreach ($sandalProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/fashion/sandal/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/fashion/sandal/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($sandal)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Kemeja ===
        $kemejaProducts = [
            ['Kemeja Aqua', 150000, 60, 'Kemeja lengan panjang warna aqua yang menenangkan, cocok untuk tampilan kasual.'],
            ['Kemeja Batik', 180000, 45, 'Kemeja batik modern dengan motif tradisional, ideal untuk acara formal dan semi-formal.'],
            ['Kemeja Biru', 120000, 70, 'Kemeja lengan pendek warna biru cerah, nyaman untuk aktivitas sehari-hari.'],
            ['Kemeja Cewek Putih', 140000, 55, 'Kemeja putih basic untuk wanita, serbaguna dan elegan.'],
            ['Kemeja Checker Hitam Putih', 160000, 50, 'Kemeja motif checkerboard hitam putih, gaya klasik yang tak lekang oleh waktu.'],
            ['Kemeja Hitam', 135000, 65, 'Kemeja hitam polos, esensial untuk berbagai gaya dan kesempatan.'],
            ['Kemeja Kotak Abu Abu', 155000, 48, 'Kemeja motif kotak-kotak abu-abu, tampilan santai namun tetap rapi.'],
            ['Kemeja Pendek Putih', 110000, 75, 'Kemeja lengan pendek putih, ringan dan cocok untuk iklim tropis.'],
            ['Kemeja Putih', 145000, 80, 'Kemeja putih lengan panjang klasik, pilihan serbaguna untuk formal atau kasual.'],
            ['Kemeja Stylish Biru Muda', 170000, 40, 'Kemeja biru muda dengan desain stylish, tampilan modern dan segar.'],
        ];
        foreach ($kemejaProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/fashion/kemeja/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/fashion/kemeja/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($kemeja)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Dress ===
        $dressProducts = [
            ['Dress Bercorak Bunga', 280000, 35, 'Dress wanita dengan motif bunga yang cerah, cocok untuk tampilan feminin dan segar.'],
            ['Dress Bercorak Hitam Putih', 260000, 40, 'Dress bercorak hitam putih, gaya klasik dan modern untuk berbagai kesempatan.'],
            ['Dress Biru', 310000, 30, 'Dress elegan berwarna biru, ideal untuk pesta atau acara semi-formal.'],
            ['Dress Cina', 380000, 20, 'Dress tradisional Cina dengan sentuhan modern, unik dan berkelas.'],
            ['Dress Hijau', 300000, 28, 'Dress kasual berwarna hijau, nyaman dan stylish untuk sehari-hari.'],
            ['Dress Hitam', 350000, 45, 'Little black dress klasik, wajib ada di lemari pakaian setiap wanita.'],
            ['Dress Hitam Simple Elegant', 320000, 38, 'Dress hitam dengan desain simple namun tetap elegan, cocok untuk berbagai acara.'],
            ['Dress Merah', 420000, 22, 'Dress merah yang memukau, tampil berani dan menawan.'],
            ['Dress Pink', 390000, 27, 'Dress pesta warna pink yang lembut, cocok untuk tampilan romantis.'],
            ['Dress Putih', 500000, 18, 'Dress putih panjang, sering digunakan sebagai gaun pengantin atau acara spesial lainnya.'],
        ];
        foreach ($dressProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/fashion/dress/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/fashion/dress/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($dress)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Kaos ===
        $kaosProducts = [
            ['Kaos Polo Biru', 95000, 70, 'Kaos polo pria berwarna biru, cocok untuk tampilan kasual yang rapi.'],
            ['Kaos Polo Hitam', 98000, 75, 'Kaos polo klasik berwarna hitam, serbaguna untuk berbagai acara.'],
            ['Kaos Polo Putih', 92000, 80, 'Kaos polo putih bersih, memberikan kesan elegan dan minimalis.'],
            ['T-Shirt Abu Abu', 65000, 100, 'T-shirt polos berwarna abu-abu, nyaman untuk aktivitas sehari-hari.'],
            ['T-Shirt Biru', 68000, 95, 'T-shirt polos berwarna biru, bahan lembut dan adem.'],
            ['T-Shirt Hijau', 67000, 90, 'T-shirt polos berwarna hijau, cocok untuk gaya santai dan segar.'],
            ['T-Shirt Hitam', 70000, 110, 'T-shirt hitam basic, esensial untuk setiap lemari pakaian.'],
            ['T-Shirt Kuning', 63000, 85, 'T-shirt polos berwarna kuning cerah, tampil beda dan ceria.'],
            ['T-Shirt Merah', 69000, 92, 'T-shirt polos berwarna merah, memberikan kesan berani dan energik.'],
            ['T-Shirt Putih', 62000, 120, 'T-shirt putih polos, paling dasar dan mudah dipadukan.'],
        ];
        foreach ($kaosProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/fashion/kaos/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/fashion/kaos/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($kaos)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Aksesoris ===
        $aksesorisProducts = [
            ['Cincin Berlian Rose Gold', 7500000, 15, 'Cincin berlian dengan desain rose gold, elegan dan mewah.'],
            ['Cincin Emas Biasa', 2500000, 30, 'Cincin emas polos, cocok untuk penggunaan sehari-hari.'],
            ['Gelang Emas Chain', 3200000, 20, 'Gelang rantai emas, desain klasik dan menawan.'],
            ['Gelang Perak', 800000, 40, 'Gelang perak murni, sederhana namun tetap stylish.'],
            ['Jam Digital Modern', 450000, 60, 'Jam tangan digital dengan fitur modern dan desain sporty.'],
            ['Jam Stylish', 1500000, 25, 'Jam tangan stylish dengan desain mewah, cocok untuk pria dan wanita.'],
            ['Kalung Emas Couple', 5000000, 18, 'Kalung emas desain couple, ideal sebagai hadiah pasangan.'],
            ['Kalung Emas Berlian', 12000000, 10, 'Kalung emas dengan hiasan berlian, sangat mewah dan berharga.'],
            ['Mahkota Elegant', 900000, 12, 'Mahkota elegan dengan desain mewah, cocok untuk acara spesial.'],
            ['Mahkota Stylish Simple', 600000, 20, 'Mahkota stylish dengan desain sederhana, cocok untuk tampilan anggun minimalis.'],
        ];
        foreach ($aksesorisProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/fashion/aksesoris/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/fashion/aksesoris/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($aksesoris)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

                // === Skincare ===
        $skincareProducts = [
            ['Wardah White Secret Serum', 75000, 50, 'Serum pencerah wajah dengan Crystal White Active untuk kulit lebih cerah.'],
            ['Hanasui Power Bright Serum', 28000, 80, 'Serum pencerah dengan Niacinamide dan Vitamin C.'],
            ['Somethinc Niacinamide + Moisture Beet Serum', 99000, 45, 'Serum dengan 10% Niacinamide untuk mencerahkan dan memperbaiki tekstur kulit.'],
            ['Azarine Hydrasoothe Sunscreen Gel SPF 45 PA++++', 65000, 70, 'Sunscreen gel ringan, tanpa whitecast, dan cocok untuk kulit berminyak.'],
            ['Avoskin Your Skin Bae Niacinamide 12%', 139000, 30, 'Serum Niacinamide tinggi untuk mengatasi hiperpigmentasi dan jerawat.'],
            ['Emina Bright Stuff Moisturizing Cream', 25000, 100, 'Pelembap ringan untuk remaja yang mencerahkan dan melembapkan.'],
            ['Garnier Micellar Cleansing Water Pink', 35000, 90, 'Pembersih wajah Micellar untuk mengangkat make-up dan kotoran dengan lembut.'],
            ['Scarlett Whitening Body Lotion Jolly', 75000, 60, 'Body lotion pencerah dengan aroma mewah dan tekstur tidak lengket.'],
            ['NPure Cica Series Face Wash', 69000, 55, 'Pembersih wajah dengan ekstrak Centella Asiatica untuk kulit berjerawat dan sensitif.'],
            ['Implora Peeling Serum', 20000, 120, 'Serum eksfoliasi untuk mengangkat sel kulit mati dan menghaluskan kulit.'],
        ];
        foreach ($skincareProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/kecantikan/skincare/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/kecantikan/skincare/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional(value: $skincare)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Makeup ===
        $makeupProducts = [
            ['Wardah Instaperfect Cushion', 165000, 40, 'Cushion dengan medium to full coverage dan hasil matte tahan lama.'],
            ['Hanasui Mattedorable Lip Cream', 29000, 70, 'Lip cream matte yang ringan dan transferproof.'],
            ['Make Over Powerstay Eye Palette', 250000, 30, 'Palet eyeshadow dengan pigmentasi tinggi dan warna bervariasi.'],
            ['Pixy Two Way Cake Perfect Fit', 55000, 80, 'Bedak padat dengan foundation yang memberikan coverage sempurna.'],
            ['Implora Cheek & Lip Tint', 22000, 90, 'Tint serbaguna untuk pipi dan bibir dengan warna cerah.'],
            ['Emina Cheeklit Cream Blush', 38000, 65, 'Cream blush dengan tekstur lembut dan mudah dibaurkan.'],
            ['Luxcrime Ultra Stay Eyeliner', 79000, 55, 'Eyeliner cair waterproof dengan ujung aplikator presisi.'],
            ['Safi Flawless Glow Foundation', 120000, 35, 'Foundation yang memberikan tampilan flawless dan meratakan warna kulit.'],
            ['BLP Beauty Lip Cotton', 109000, 50, 'Lip cream dengan tekstur cotton yang nyaman di bibir.'],
            ['Focallure Staymax Mascara', 45000, 75, 'Maskara waterproof yang memberikan volume dan panjang pada bulu mata.'],
        ];
        foreach ($makeupProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/kecantikan/makeup/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/kecantikan/makeup/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($makeup)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }


        // === Parfum ===
        $parfumProducts = [
            ['Evangeline Eau De Parfum Lively', 55000, 60, 'Parfum wanita dengan aroma fruity floral yang menyegarkan.'],
            ['Pinkberry Eau De Parfum Wild Berry', 45000, 70, 'Parfum dengan aroma berry yang manis dan playful.'],
            ['Carl & Claire Eau De Parfum Black', 180000, 25, 'Parfum unisex dengan aroma oriental woody yang bold.'],
            ['Yves Saint Laurent Black Opium EDP', 1200000, 5, 'Parfum mewah dengan aroma kopi hitam dan vanilla.'],
            ['HMNS Perfume Orgsm', 295000, 15, 'Parfum lokal populer dengan aroma amber floral yang unik.'],
            ['The Body Shop White Musk EDP', 400000, 20, 'Parfum klasik dengan aroma musk yang lembut dan bersih.'],
            ['Misk Thaharah Original', 85000, 40, 'Parfum non-alkohol dengan aroma musk yang kental dan tahan lama.'],
            ['SAFF & Co. Eau De Parfum S.O.S', 179000, 22, 'Parfum lokal dengan aroma citrus floral yang cocok untuk daily.'],
            ['MINISO Cherry Blossom EDP', 60000, 50, 'Parfum dengan aroma cherry blossom yang manis dan ringan.'],
            ['Wardah Scentsation Body Mist Passion', 30000, 80, 'Body mist dengan aroma buah dan bunga yang menyegarkan.'],
        ];
        foreach ($parfumProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/kecantikan/parfum/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/kecantikan/parfum/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($parfum)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Sabun ===
        $sabunProducts = [
            ['Scarlett Whitening Shower Scrub Pomegrante', 75000, 100, 'Sabun mandi scrub dengan butiran halus untuk mencerahkan kulit.'],
            ['Wardah Pure Botanical Body Wash', 30000, 120, 'Sabun mandi botanical dengan aroma segar dan membersihkan secara lembut.'],
            ['Biore Guard Body Foam Energetic Cool', 25000, 90, 'Sabun mandi dengan sensasi dingin menyegarkan.'],
            ['Citra Body Wash Fresh Glow', 28000, 110, 'Sabun mandi yang mencerahkan kulit dengan ekstrak buah.'],
            ['Dove Deeply Nourishing Body Wash', 38000, 85, 'Sabun mandi yang menutrisi kulit hingga lapisan dalam.'],
            ['Lifebuoy Sabun Cair Total 10', 20000, 150, 'Sabun mandi antibakteri untuk perlindungan kuman.'],
            ['Zen Antibacterial Body Wash Shiso & Sulphur', 35000, 70, 'Sabun antibakteri dengan sensasi dingin dan aroma shiso.'],
            ['Vaseline Healthy Bright Body Wash', 40000, 95, 'Body wash yang mencerahkan dan menjaga kelembapan kulit.'],
            ['Shinzui Body Cleanser Kirei', 32000, 80, 'Sabun mandi dengan ekstrak bunga Jepang untuk kulit cerah.'],
            ['Leivy Naturally Shower Cream Goat\'s Milk', 60000, 60, 'Sabun mandi susu kambing untuk melembapkan kulit kering.'],
        ];
        foreach ($sabunProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext = file_exists(public_path("images/kecantikan/sabun/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img = "/images/kecantikan/sabun/{$slug}.{$ext}";

            Product::create([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'subcategory_id' => optional($sabun)->id,
                'image_url' => $img,
                'description' => $desc,
            ]);
        }

        // === Shampoo ===
        $shampooProducts = [
            ['Pantene Anti Lepek', 45000, 80, 'Shampoo yang membuat rambut tidak lepek sepanjang hari.'],
            ['Clear Anti Ketombe', 50000, 75, 'Shampoo anti ketombe dengan Triple Anti-Dandruff Technology.'],
            ['Rejoice Rich Soft Smooth', 35000, 90, 'Shampoo untuk rambut halus dan lembut dengan wangi tahan lama.'],
            ['Head & Shoulders Cool Menthol', 55000, 70, 'Shampoo anti ketombe dengan sensasi menthol dingin.'],
            ['Kerastase Bain Satin 2', 350000, 15, 'Shampoo nutrisi intensif untuk rambut kering dan sensitif.'],
            ['Sunsilk Hijab Refresh & Anti Ketombe', 28000, 100, 'Shampoo khusus hijab dengan sensasi segar dan anti ketombe.'],
            ['TRESemme Keratin Smooth', 65000, 60, 'Shampoo dengan Keratin untuk rambut lurus dan mudah diatur.'],
            ['Herbal Essences White Grapefruit & Mosa Mint', 70000, 55, 'Shampoo alami dengan aroma menyegarkan untuk volume rambut.'],
            ['Dove Total Damage Treatment', 40000, 85, 'Shampoo yang memperbaiki rambut rusak dari pangkal hingga ujung.'],
            ['Loreal Extraordinary Oil Shampoo', 58000, 65, 'Shampoo dengan 6 ekstrak bunga untuk rambut berkilau.'],
        ];
        foreach ($shampooProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext = file_exists(public_path("images/kecantikan/shampoo/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img = "/images/kecantikan/shampoo/{$slug}.{$ext}";

            Product::create([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'subcategory_id' => optional($shampoo)->id,
                'image_url' => $img,
                'description' => $desc,
            ]);
        }

        // === Body Lotion ===
        $bodyLotionProducts = [
            ['Vaseline Healthy Bright Gluta-Hya Serum Burst Lotion', 65000, 90, 'Lotion pencerah kulit dengan teknologi GlutaGlow dan Hyaluron.'],
            ['Nivea Extra White Body Serum', 55000, 80, 'Body serum yang mencerahkan kulit kusam dengan Vitamin C.'],
            ['Marina Healthy & Glow Body Lotion', 22000, 120, 'Lotion tubuh dengan Biowhitening Complex untuk kulit sehat bercahaya.'],
            ['Citra Hand & Body Lotion Fresh Glow', 30000, 110, 'Lotion pencerah dengan ekstrak aloe vera dan mint.'],
            ['Herborist Body Butter Zaitun', 38000, 70, 'Body butter dengan minyak zaitun untuk kulit sangat kering.'],
            ['Scarlett Whitening Body Lotion Freshy', 75000, 60, 'Body lotion pencerah dengan aroma segar dan melembapkan.'],
            ['Wardah Lightening Body Lotion', 45000, 85, 'Lotion tubuh yang membantu mencerahkan dan melindungi kulit.'],
            ['Vaseline Intensive Care Aloe Soothe', 50000, 95, 'Lotion pelembap dengan ekstrak aloe vera untuk kulit kering.'],
            ['Hanasui Whitening Body Lotion', 25000, 100, 'Lotion pencerah kulit dengan tekstur ringan.'],
            ['Viva Hand & Body Lotion Bengkuang', 15000, 150, 'Lotion tradisional dengan ekstrak bengkuang untuk kulit cerah alami.'],
        ];
        foreach ($bodyLotionProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext = file_exists(public_path("images/kecantikan/body-lotion/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img = "/images/kecantikan/body-lotion/{$slug}.{$ext}";

            Product::create([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'subcategory_id' => optional(value: $body_lotion)->id,
                'image_url' => $img,
                'description' => $desc,
            ]);
        }

        // === Lipstick ===
        $lipstickProducts = [
            ['Wardah Colorfit Velvet Matte Lip Mousse', 69000, 60, 'Lip mousse halal dengan hasil velvet matte dan ringan di bibir.'],
            ['Hanasui Mattedorable Lip Cream Shade 01 Kiss', 29000, 80, 'Lip cream matte yang tahan lama dengan warna merah muda.'],
            ['Implora Urban Lip Cream Matte 03 Dark Berry', 25000, 90, 'Lip cream matte lokal dengan pilihan warna bervariasi.'],
            ['Emina Creamatte Lip Cream Fuzzy Wuzzy', 40000, 70, 'Lip cream matte ringan untuk remaja.'],
            ['Somethinc Ombre Lip Kit', 120000, 40, 'Set lipstik untuk menciptakan tampilan ombre bibir.'],
            ['Make Over Powerstay Transferproof Matte Lip Cream', 95000, 50, 'Lip cream matte transferproof yang tahan hingga 14 jam.'],
            ['Rollover Reaction Sueded Lip And Cheek Cream', 119000, 35, 'Lip and cheek cream multifungsi dengan hasil powdery matte.'],
            ['Dear Me Beauty Perfect Matte Lip Coat', 109000, 45, 'Lip coat matte yang nyaman dipakai dan tidak membuat bibir kering.'],
            ['BLP Beauty Lip Bullet Butter Fudge', 129000, 30, 'Lipstik dengan tekstur butter yang lembut dan melembapkan bibir.'],
            ['Pixy Lip Cream Matte 01 Chic Rose', 45000, 75, 'Lip cream matte dengan warna nude rose yang cocok untuk sehari-hari.'],
        ];
        foreach ($lipstickProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/kecantikan/lipstick/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/kecantikan/lipstick/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($lipstick)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Masker Wajah ===
        $maskerWajahProducts = [
            ['Wardah Nature Daily Sheet Mask Green Tea', 18000, 150, 'Sheet mask dengan ekstrak green tea untuk menenangkan kulit.'],
            ['Emina Clay Mask Brightening', 35000, 100, 'Masker tanah liat yang membantu mencerahkan kulit kusam.'],
            ['Mediheal Tea Tree Care Solution Mask Ex', 30000, 120, 'Sheet mask terpopuler untuk kulit berjerawat dan sensitif.'],
            ['Skintific Mugwort Acne Clay Mask', 89000, 70, 'Clay mask dengan ekstrak mugwort untuk membersihkan pori-pori dan meredakan jerawat.'],
            ['Bioaqua Masker Wajah Blueberry', 10000, 200, 'Masker wajah ekonomis dengan ekstrak blueberry untuk hidrasi.'],
            ['Viva White Masker Spirulina', 15000, 180, 'Masker bubuk spirulina untuk detoksifikasi dan mencerahkan kulit.'],
            ['Freeman Feeling Beautiful Clay Mask Avocado & Oatmeal', 60000, 50, 'Masker tanah liat dengan avocado & oatmeal untuk kulit normal ke kombinasi.'],
            ['Originote Mugwort Acne Clay Stick', 39000, 90, 'Clay mask dalam bentuk stick yang praktis untuk jerawat.'],
        ];
        foreach ($maskerWajahProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/kecantikan/masker-wajah/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/kecantikan/masker-wajah/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($masker_wajah)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Eyebrow ===
        $eyebrowProducts = [
            ['Implora Eyebrow Pencil Brown', 15000, 100, 'Pensil alis murah meriah dengan spoolie brush.'],
            ['Wardah Eyexpert Brow Mascara', 60000, 70, 'Maskara alis untuk merapikan dan memberi warna pada alis.'],
            ['Viva Queen Eyebrow Pencil Black', 20000, 120, 'Pensil alis klasik dengan warna hitam pekat.'],
            ['Make Over Brow Styler Eye Definer', 85000, 50, 'Pensil alis mekanik dengan ujung presisi dan sikat.'],
            ['Hanasui Eyebrow Matic Pencil', 25000, 90, 'Pensil alis matic yang mudah diaplikasikan dan tahan lama.'],
            ['Eska Eyebrow Definer', 45000, 60, 'Definer alis untuk mengisi dan membentuk alis dengan mudah.'],
            ['Luxcrime Brow Lamination Kit', 150000, 20, 'Kit untuk laminasi alis di rumah, hasil rapi dan tahan lama.'],
            ['Pixy Eyebrow Pencil Dark Grey', 28000, 85, 'Pensil alis dengan warna abu-abu gelap yang natural.'],
            ['Somethinc BROW WIZ Browcara', 79000, 40, 'Browcara untuk merapikan dan memberi volume pada alis.'],
            ['Madam Gie Eyebrow Cream', 20000, 110, 'Cream alis yang waterproof dan smudgeproof.'],
        ];
        foreach ($eyebrowProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/kecantikan/eyebrow/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/kecantikan/eyebrow/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($eyebrow)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Foundation ===
        $foundationProducts = [
            ['Wardah Colorfit Matte Foundation', 135000, 40, 'Foundation halal dengan hasil matte dan ringan di kulit.'],
            ['Make Over Powerstay Weightless Liquid Foundation', 190000, 30, 'Foundation cair tahan lama dengan coverage tinggi.'],
            ['Pixy Make It Glow Dewy Cushion', 125000, 35, 'Cushion dengan hasil dewy glow yang natural.'],
            ['LT PRO HD Liquid Foundation', 180000, 25, 'Foundation HD untuk tampilan flawless di kamera.'],
            ['Ultima II Delicate Translucent Face Powder', 110000, 50, 'Bedak tabur translucent untuk mengunci make-up.'],
            ['Wardah Exclusive Liquid Foundation', 95000, 45, 'Foundation cair dengan formula ringan dan coverage medium.'],
            ['Hanasui Perfect Fit Powder Foundation', 45000, 60, 'Two way cake Hanasui dengan coverage medium.'],
            ['Emina Daily Matte BB Cream', 30000, 70, 'BB Cream ringan untuk remaja dengan hasil matte.'],
            ['Somethinc Copy Paste Breathable Cushion', 185000, 38, 'Cushion dengan formula breathable dan hasil semi-matte.'],
            ['Dear Me Beauty Air Pore Blurring Primer', 109000, 55, 'Primer yang membantu menyamarkan pori-pori dan membuat makeup tahan lama.'],
        ];
        foreach ($foundationProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext = file_exists(public_path("images/kecantikan/foundation/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img = "/images/kecantikan/foundation/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($foundation)->id,
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Hobi ===
        // === Game ===
        $gameProducts = [
            ['Nintendo Switch OLED', 4500000, 10, 'Konsol game portabel dan TV mode dengan layar OLED yang cerah.'],
            ['PlayStation 5 Slim', 8000000, 8, 'Konsol game generasi terbaru dengan performa grafis tinggi dan SSD ultra-cepat.'],
            ['Xbox Series X', 7500000, 7, 'Konsol game next-gen dengan kekuatan pemrosesan luar biasa dan Game Pass.'],
            ['Game Controller Wireless PS5', 900000, 30, 'Controller nirkabel resmi untuk PlayStation 5 dengan fitur haptic feedback.'],
            ['Game Headset Gaming HyperX Cloud II', 1200000, 25, 'Headset gaming nyaman dengan suara surround 7.1 virtual.'],
            ['Gaming Mouse Logitech G502 HERO', 700000, 35, 'Mouse gaming presisi dengan sensor HERO dan bobot yang dapat disesuaikan.'],
            ['Gaming Keyboard Razer BlackWidow V3', 1500000, 20, 'Keyboard gaming mekanikal dengan switch tactile dan RGB lighting.'],
            ['VR Headset Oculus Quest 2', 5500000, 12, 'Headset VR standalone untuk pengalaman imersif tanpa kabel.'],
            ['Portable Projector untuk Gaming', 3000000, 18, 'Proyektor mini portabel untuk pengalaman gaming layar besar.'],
        ];
        foreach ($gameProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext = file_exists(public_path("images/hobi/game/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img = "/images/hobi/game/{$slug}.{$ext}";

            Product::create([
                'name' => $name, 'price' => $price, 
                'stock' => $stock, 
                'subcategory_id' => optional($game)->id, 
                'image_url' => $img, 
                'description' => $desc,
            ]);
        }

        // === Puzzle ===
        $puzzleProducts = [
            ['Puzzle Jigsaw 1000 Pcs Pemandangan Alam', 120000, 60, 'Puzzle jigsaw 1000 keping dengan gambar pemandangan gunung yang indah.'],
            ['Rubik\'s Cube 3x3 Original', 75000, 80, 'Kubus Rubik 3x3 klasik, melatih logika dan kecepatan.'],
            ['Puzzle 3D Eiffel Tower', 150000, 40, 'Puzzle 3D model Menara Eiffel, cocok sebagai pajangan.'],
            ['Wooden Brain Teaser Puzzle Set', 90000, 50, 'Set puzzle kayu asah otak, berbagai bentuk dan tingkat kesulitan.'],
            ['Puzzle Roll-Up Mat', 50000, 70, 'Matras gulung untuk menyimpan puzzle yang belum selesai.'],
            ['Logic Puzzle Book for Adults', 65000, 90, 'Buku berisi kumpulan teka-teki logika untuk mengasah otak.'],
            ['Kids Jigsaw Puzzle Alphabet', 40000, 100, 'Puzzle jigsaw edukatif untuk anak-anak mengenal huruf.'],
            ['Sudoku Puzzle Book Medium Level', 30000, 110, 'Buku Sudoku dengan tingkat kesulitan sedang.'],
            ['Metal Wire Puzzle Set', 80000, 45, 'Set puzzle kawat logam yang menantang dan melatih kesabaran.'],
            ['Personalized Photo Puzzle 500 Pcs', 200000, 20, 'Puzzle kustom dari foto pribadi Anda.'],
        ];
        foreach ($puzzleProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext = file_exists(public_path("images/hobi/puzzle/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img = "/images/hobi/puzzle/{$slug}.{$ext}";
            
             Product::create([
                'name' => $name, 'price' => $price, 
                'stock' => $stock, 
                'subcategory_id' => optional($puzzle)->id, 
                'image_url' => $img, 
                'description' => $desc,
            ]);
        }

        // === Model Kit ===
        $modelKitProducts = [
            ['Gundam RG RX-93 Nu Gundam', 450000, 30, 'Model kit Gundam Real Grade dengan detail mekanik yang tinggi.'],
            ['Tamiya Mini 4WD Raikiri', 150000, 40, 'Model kit Mini 4WD populer, mudah dirakit dan balapan.'],
            ['Bandai Entry Grade RX-78-2 Gundam', 100000, 50, 'Model kit Gundam Entry Grade, mudah dirakit tanpa alat khusus.'],
            ['Model Kit Pesawat Tempur F-16 Falcon', 250000, 25, 'Model kit pesawat tempur skala 1/72, cocok untuk pemula.'],
            ['Scale Model Mobil Sport Ferrari', 350000, 20, 'Model skala mobil sport Ferrari, detail interior dan eksterior.'],
            ['Model Kit Kapal Perang Bismarck', 600000, 15, 'Model kit kapal perang sejarah skala besar.'],
            ['Figure Model Dragon Ball Z Goku', 180000, 35, 'Model figure karakter Dragon Ball Z yang dapat dipose.'],
            ['Model Kit Robot Transformers Optimus Prime', 500000, 18, 'Model kit robot Transformers yang dapat berubah bentuk.'],
            ['Model Kit Bangunan Miniatur Jepang', 200000, 30, 'Model kit miniatur bangunan tradisional Jepang.'],
            ['Cat Akrilik untuk Model Kit Set', 80000, 60, 'Set cat akrilik berbagai warna untuk mewarnai model kit Anda.'],
        ];
        foreach ($modelKitProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/hobi/model-kit/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/hobi/model-kit/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($model_kit)->id, 
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Buku ===
        $bukuProducts = [
            ['Novel "Laskar Pelangi" - Andrea Hirata', 85000, 100, 'Kisah inspiratif tentang perjuangan anak-anak di Belitung.'],
            ['Buku Self-Improvement "Atomic Habits"', 110000, 80, 'Panduan praktis untuk membangun kebiasaan baik dan menghilangkan kebiasaan buruk.'],
            ['Komik "One Piece" Vol. 100', 40000, 150, 'Volume terbaru dari seri komik petualangan bajak laut yang populer.'],
            ['Buku Resep Masakan Nusantara', 130000, 70, 'Kumpulan resep masakan khas Indonesia dari berbagai daerah.'],
            ['Kamus Bahasa Inggris Oxford', 200000, 50, 'Kamus lengkap bahasa Inggris untuk pelajar dan umum.'],
            ['Novel Fiksi Ilmiah "Dune"', 95000, 60, 'Epos fiksi ilmiah klasik tentang intrik politik dan ekologi di planet gurun.'],
            ['Buku Anak "Cerita Binatang Fabel"', 70000, 120, 'Kumpulan cerita fabel dengan pesan moral untuk anak-anak.'],
            ['Buku Fotografi Dasar', 150000, 40, 'Panduan dasar fotografi untuk pemula, mencakup teknik dan komposisi.'],
            ['Novel Thriller "Gone Girl" - Gillian Flynn', 90000, 55, 'Novel thriller psikologis yang penuh plot twist dan ketegangan.'],
            ['Buku Sejarah Indonesia Modern', 140000, 30, 'Buku sejarah yang mengulas periode Indonesia modern secara komprehensif.'],
        ];
        foreach ($bukuProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/hobi/buku/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/hobi/buku/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($buku)->id, 
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Alat Musik ===
        $alatMusikProducts = [
            ['Gitar Akustik Yamaha F310', 1300000, 10, 'Gitar akustik populer untuk pemula dengan suara jernih.'],
            ['Keyboard Roland GO:KEYS', 4500000, 8, 'Keyboard portabel dengan fitur fun dan edukatif.'],
            ['Ukulele Soprano Mahoni', 300000, 20, 'Ukulele ukuran soprano dari kayu mahoni.'],
            ['Drum Elektrik Alesis Nitro Mesh Kit', 5500000, 5, 'Set drum elektrik dengan mesh head yang responsif.'],
            ['Harmonika Hohner Blues Harp', 250000, 30, 'Harmonika diatonis untuk genre blues dan folk.'],
            ['Stand Gitar Lipat Universal', 100000, 50, 'Stand gitar yang ringkas dan mudah dibawa.'],
            ['Kabel Gitar Jack to Jack 3 Meter', 75000, 60, 'Kabel instrumen berkualitas tinggi untuk gitar.'],
            ['Metronome Digital', 120000, 40, 'Metronom digital dengan berbagai tempo dan ritme.'],
            ['Senar Gitar Akustik Elixir', 150000, 35, 'Set senar gitar akustik coated, tahan lama dan jernih.'],
            ['Cajon Portable', 800000, 12, 'Alat musik perkusi Cajon yang mudah dipindahkan.'],
        ];
        foreach ($alatMusikProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/hobi/alat-musik/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/hobi/alat-musik/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($alat_musik)->id, 
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Drone ===
        $droneProducts = [
            ['DJI Mini 3 Pro Fly More Combo', 12000000, 5, 'Drone lipat ringan dengan kamera 4K dan deteksi rintangan.'],
            ['DJI Mavic 3 Cine Premium Combo', 35000000, 2, 'Drone profesional dengan kamera Hasselblad dan transmisi sinyal jauh.'],
            ['Ryze Tello Mini Drone', 1500000, 15, 'Drone mini untuk pemula, ideal untuk edukasi coding dan kesenangan.'],
            ['DJI Air 2S Fly More Combo', 15000000, 4, 'Drone dengan sensor 1 inci dan video 5.4K, portabel.'],
            ['Holy Stone HS720E GPS Drone', 3500000, 10, 'Drone GPS dengan kamera 4K dan baterai tahan lama.'],
            ['Hubsan Zino Mini Pro', 6000000, 8, 'Drone mini dengan kamera 4K dan 3-axis gimbal.'],
            ['FIMI X8 Mini Pro', 4500000, 9, 'Drone lipat ultra-ringan dengan kamera 4K.'],
            ['Autel Robotics EVO Nano+', 14000000, 3, 'Drone mini yang ringan dengan kamera 50MP.'],
            ['Parrot Anafi FPV Drone', 7000000, 6, 'Drone FPV dengan kamera 4K HDR dan desain unik.'],
            ['DJI Avata FPV Drone Pro-View Combo', 20000000, 2, 'Drone FPV sinematik untuk pengalaman terbang imersif.'],
        ];
        foreach ($droneProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/hobi/drone/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/hobi/drone/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($drone)->id, 
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Kamera Analog ===
        $kameraAnalogProducts = [
            ['Kamera Film Analog Canon AE-1', 2500000, 10, 'Kamera film SLR klasik yang populer di kalangan fotografer.'],
            ['Roll Film Kodak Portra 400 (36 exp)', 150000, 50, 'Film negatif warna profesional untuk hasil tone kulit yang indah.'],
            ['Kamera Point and Shoot Film Olympus Mju-II', 3000000, 5, 'Kamera kompak film populer dengan lensa tajam dan desain saku.'],
            ['Film Hitam Putih Ilford HP5 Plus (36 exp)', 120000, 40, 'Film hitam putih serbaguna untuk berbagai kondisi cahaya.'],
            ['Kamera Analog TLR Yashica Mat-124G', 4000000, 3, 'Kamera Twin Lens Reflex klasik untuk format medium.'],
            ['Cairan Developer Film Hitam Putih', 80000, 60, 'Cairan kimia untuk memproses film hitam putih secara mandiri.'],
            ['Album Foto Analog Kulit', 180000, 25, 'Album foto klasik berlapis kulit untuk menyimpan cetakan film Anda.'],
            ['Light Meter Analog Sekonic L-308X', 1500000, 8, 'Light meter digital portabel untuk pengukuran cahaya yang akurat.'],
            ['Scanner Film Negatif Digital', 2000000, 12, 'Scanner untuk mendigitalkan film negatif dan slide Anda.'],
            ['Kit Cuci Film Rumahan', 600000, 15, 'Set lengkap untuk cuci film di rumah, cocok untuk hobi.'],
        ];
        foreach ($kameraAnalogProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/hobi/kamera-analog/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/hobi/kamera-analog/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($kamera_analog)->id, 
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Kartu Koleksi ===
        $kartuKoleksiProducts = [
            ['Pokemon TCG Booster Box Terbaru', 1000000, 10, 'Kotak booster pack terbaru Pokemon TCG, berisi banyak kartu langka.'],
            ['Magic: The Gathering Commander Deck', 400000, 20, 'Deck Commander siap main untuk Magic: The Gathering.'],
            ['Yu-Gi-Oh! Structure Deck Legend of the Crystal Beasts', 200000, 30, 'Struktur deck Yu-Gi-Oh! siap main dengan strategi Crystal Beasts.'],
            ['Sleeve Kartu Ultra Pro Deck Protector', 75000, 50, 'Sleeve pelindung kartu berkualitas tinggi, 100 lembar.'],
            ['Album Binder Kartu Koleksi 9-Pocket', 150000, 40, 'Binder album untuk menyimpan kartu koleksi Anda dengan rapi.'],
            ['Kartu Koleksi NBA Panini Prizm Box', 800000, 12, 'Kotak kartu koleksi basket NBA Panini Prizm, cari kartu rookie langka.'],
            ['Kartu Koleksi Sepak Bola Panini Adrenalyn XL', 100000, 45, 'Paket kartu koleksi sepak bola Panini Adrenalyn XL.'],
            ['Kotak Penyimpanan Kartu Ultra Pro', 50000, 60, 'Kotak plastik keras untuk menyimpan deck kartu Anda.'],
            ['Playmat Custom Gaming TCG', 250000, 15, 'Playmat kustom untuk bermain TCG, desain menarik.'],
            ['Mystery Box Kartu Koleksi Rare', 500000, 8, 'Kotak misteri berisi kartu koleksi langka dari berbagai TCG.'],
        ];
        foreach ($kartuKoleksiProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/hobi/kartu-koleksi/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/hobi/kartu-koleksi/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($kartu_koleksi)->id, 
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Kerajinan ===
        $kerajinanProducts = [
            ['Set Alat Rajut Pemula', 150000, 40, 'Set lengkap alat rajut untuk pemula, termasuk benang dan pola.'],
            ['Benang Rajut Akrilik Warna Warni', 25000, 100, 'Gulungan benang rajut akrilik berbagai warna.'],
            ['Set Alat Jahit Mini', 80000, 70, 'Set alat jahit portabel untuk perbaikan pakaian.'],
            ['Kain Flanel Berbagai Warna', 15000, 150, 'Lembaran kain flanel berbagai warna untuk proyek kerajinan.'],
            ['Set Melukis Akrilik Lengkap', 200000, 30, 'Set cat akrilik, kuas, dan kanvas untuk melukis.'],
            ['Peralatan Membuat Lilin Aromaterapi DIY', 180000, 25, 'Kit lengkap untuk membuat lilin aromaterapi Anda sendiri.'],
            ['Set Membuat Sabun Homemade', 220000, 20, 'Kit untuk membuat sabun homemade dengan bahan alami.'],
            ['Kertas Origami Motif Jepang', 30000, 130, 'Set kertas origami dengan motif tradisional Jepang.'],
            ['Alat Ukir Kayu Mini Set', 120000, 35, 'Set alat ukir kayu kecil untuk kerajinan detail.'],
            ['Buku Panduan Kerajinan Tangan Kreatif', 75000, 50, 'Buku berisi ide dan panduan untuk berbagai kerajinan tangan.'],
        ];
        foreach ($kerajinanProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/hobi/kerajinan/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/hobi/kerajinan/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($kerajinan)->id, 
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Lego ===
        $legoProducts = [
            ['LEGO Classic Medium Creative Brick Box', 400000, 30, 'Kotak LEGO klasik dengan berbagai balok warna-warni untuk kreasi bebas.'],
            ['LEGO City Police Patrol Boat', 250000, 35, 'Set LEGO City perahu patroli polisi dengan figur minifigure.'],
            ['LEGO Creator Expert Ford Mustang', 2000000, 10, 'Model LEGO Creator Expert mobil Ford Mustang klasik yang detail.'],
            ['LEGO Technic Bugatti Chiron', 6000000, 5, 'Model LEGO Technic super sport car Bugatti Chiron skala 1:8.'],
            ['LEGO Friends Friendship House', 800000, 25, 'Set LEGO Friends rumah persahabatan dengan banyak ruangan dan aksesori.'],
            ['LEGO Duplo My First Animal Train', 300000, 40, 'Set LEGO Duplo untuk balita, kereta hewan yang mudah dirakit.'],
            ['LEGO Star Wars Millennium Falcon', 1500000, 8, 'Model LEGO Star Wars Millennium Falcon yang ikonik.'],
            ['LEGO Minecraft The End Portal', 700000, 15, 'Set LEGO Minecraft dengan portal ke dimensi End.'],
            ['LEGO Harry Potter Hogwarts Great Hall', 1300000, 12, 'Model LEGO Harry Potter Aula Besar Hogwarts yang detail.'],
            ['LEGO Marvel Super Heroes Avengers Tower', 4500000, 7, 'Model LEGO Marvel menara Avengers yang tinggi dengan banyak figur.'],
        ];
        foreach ($legoProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/hobi/lego/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/hobi/lego/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($lego)->id, 
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Bola ===
        $bolaProducts = [
            ['Bola Sepak Standar FIFA', 250000, 40, 'Bola sepak kualitas standar FIFA untuk pertandingan dan latihan.'],
            ['Bola Basket Size 7 Premium', 220000, 35, 'Bola basket resmi ukuran 7 dengan grip optimal untuk pemain profesional.'],
            ['Bola Voli Pantai Mikasa', 180000, 30, 'Bola voli pantai tahan air dengan desain cerah untuk kesenangan di pasir.'],
            ['Bola Futsal Indoor Pro', 190000, 28, 'Bola futsal dengan kontrol presisi untuk permainan cepat di lapangan indoor.'],
            ['Bola Tenis Lapangan Head', 90000, 60, 'Set bola tenis dengan pantulan konsisten untuk performa terbaik di lapangan.'],
            ['Bola Golf Pack 12 Pcs', 150000, 25, 'Paket 12 bola golf dengan daya terbang jauh dan akurasi tinggi.'],
            ['Bola Yoga Anti-Burst', 130000, 50, 'Bola yoga anti-pecah untuk latihan keseimbangan, kekuatan, dan fleksibilitas.'],
            ['Bola Kasti Training', 45000, 70, 'Bola kasti lembut dan aman untuk latihan dasar dan permainan rekreasi.'],
        ];
        foreach ($bolaProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/olahraga/bola/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/olahraga/bola/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($bola)->id, 
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Dumbbell ===
        $dumbbellProducts = [
            ['Dumbbell Set 5kg Vinyl', 200000, 30, 'Sepasang dumbbell vinyl 5kg, ideal untuk latihan di rumah.'],
            ['Dumbbell Adjustable 20kg', 1200000, 15, 'Dumbbell adjustable 20kg yang hemat ruang untuk berbagai intensitas latihan.'],
            ['Dumbbell Hex Karet 10kg', 350000, 25, 'Dumbbell hex dengan lapisan karet 10kg, nyaman digenggam dan tidak licin.'],
            ['Dumbbell Neoprene 3kg', 90000, 50, 'Sepasang dumbbell neoprene 3kg, cocok untuk aerobik dan pemanasan.'],
            ['Rak Dumbbell Vertikal', 700000, 10, 'Rak penyimpanan dumbbell vertikal, menjaga area latihan tetap rapi.'],
            ['Dumbbell Set Anak-Anak', 75000, 40, 'Dumbbell ringan dan aman untuk melatih motorik anak-anak.'],
            ['Plat Beban Dumbbell 2.5kg', 60000, 60, 'Plat beban tambahan 2.5kg untuk dumbbell yang bisa disesuaikan.'],
            ['Dumbbell Smart Koneksi App', 2500000, 8, 'Dumbbell pintar yang terhubung aplikasi untuk melacak progres latihan.'],
        ];
        foreach ($dumbbellProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/olahraga/dumbbell/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/olahraga/dumbbell/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($dumbbell)->id, 
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Jersey ===
        $jerseyProducts = [
            ['Jersey Sepak Bola Timnas', 180000, 60, 'Jersey Tim Nasional dengan desain terbaru dan bahan yang nyaman.'],
            ['Jersey Basket Reversible', 150000, 45, 'Jersey basket dua sisi, cocok untuk latihan dan pertandingan persahabatan.'],
            ['Jersey Sepeda Dry-Fit', 170000, 40, 'Jersey sepeda cepat kering dengan kantong belakang untuk pesepeda.'],
            ['Jersey Voli Slim Fit', 140000, 50, 'Jersey voli slim fit yang elastis untuk kebebasan bergerak di lapangan.'],
            ['Jersey Custom E-Sport', 220000, 30, 'Jersey gaming kustom dengan desain unik untuk tim e-sport Anda.'],
            ['Jersey Lari Reflektif', 160000, 55, 'Jersey lari ringan dengan elemen reflektif untuk keamanan di malam hari.'],
            ['Jersey Fitness Breathable', 120000, 70, 'Jersey fitness dengan sirkulasi udara optimal untuk kenyamanan saat nge-gym.'],
            ['Jersey Polo Golf Premium', 210000, 25, 'Jersey polo golf premium dengan bahan anti-UV dan desain elegan.'],
        ];
        foreach ($jerseyProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/olahraga/jersey/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/olahraga/jersey/{$slug}.{$ext}";

            Product::create([
                'name'           => $name,
                'price'          => $price,
                'stock'          => $stock,
                'subcategory_id' => optional($jersey)->id, 
                'image_url'      => $img,
                'description'    => $desc,
            ]);
        }

        // === Kacamata Renang ===
        $kacamataRenangProducts = [
            ['Kacamata Renang Anti-Fog UV Dewasa', 110000, 50, 'Kacamata renang dewasa anti-kabut dan perlindungan UV untuk pandangan jernih.'],
            ['Kacamata Renang Anak-Anak Karakter', 85000, 60, 'Kacamata renang anak-anak dengan desain karakter lucu dan nyaman dipakai.'],
            ['Kacamata Renang Kompetisi Low Profile', 150000, 35, 'Kacamata renang kompetisi dengan profil rendah untuk mengurangi hambatan air.'],
            ['Kacamata Renang Minus Pro', 200000, 20, 'Kacamata renang dengan lensa minus, ideal bagi yang memiliki masalah penglihatan.'],
            ['Kacamata Renang Mirrored Lens', 130000, 40, 'Kacamata renang lensa cermin untuk mengurangi silau di kolam renang outdoor.'],
            ['Kacamata Renang Snorkeling Set', 170000, 25, 'Set kacamata renang dan snorkel untuk pengalaman snorkeling yang menyenangkan.'],
            ['Kacamata Renang Tali Silikon', 95000, 55, 'Kacamata renang dengan tali silikon yang nyaman dan tidak mudah melorot.'],
            ['Kacamata Renang Training Adjustable', 100000, 48, 'Kacamata renang training yang mudah disesuaikan untuk berbagai ukuran wajah.'],
        ];
        foreach ($kacamataRenangProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/olahraga/kacamataRenang/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/olahraga/kacamataRenang/{$slug}.{$ext}";

            Product::create([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'subcategory_id' => optional(value: $kacamata_renang)->id,
                'image_url' => $img,
                'description' => $desc,
            ]);
        }

        // === Matras ===
        $matrasProducts = [
            ['Matras Yoga Anti-Slip Tebal 6mm', 160000, 45, 'Matras yoga anti-selip dengan ketebalan 6mm untuk kenyamanan dan stabilitas.'],
            ['Matras Camping Ultralight Lipat', 280000, 25, 'Matras camping ringan dan dapat dilipat, cocok untuk backpacking.'],
            ['Matras Fitness Shock Absorbent', 220000, 30, 'Matras fitness peredam kejut untuk latihan intensitas tinggi dan angkat beban.'],
            ['Matras Piknik Tahan Air', 190000, 35, 'Matras piknik besar tahan air, ideal untuk kegiatan outdoor bersama keluarga.'],
            ['Matras Peregangan Pilates', 180000, 40, 'Matras khusus pilates untuk latihan fleksibilitas dan penguatan inti.'],
            ['Matras Olahraga Anak-Anak Bermotif', 120000, 55, 'Matras olahraga dengan motif ceria untuk aktivitas fisik anak-anak.'],
            ['Matras Puzzle Lantai Gym', 350000, 20, 'Matras puzzle interlock untuk lantai gym rumah, mudah dipasang dan dibersihkan.'],
            ['Matras Akupresur Relaksasi', 400000, 15, 'Matras akupresur untuk meredakan nyeri otot dan meningkatkan relaksasi tubuh.'],
        ];
        foreach ($matrasProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/olahraga/matras/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/olahraga/matras/{$slug}.{$ext}";

            Product::create([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'subcategory_id' => optional($matras)->id,
                'image_url' => $img,
                'description' => $desc,
            ]);
        }

        // === Pelindung Lutut ===
        $pelindungLututProducts = [
            ['Pelindung Lutut Basket Kompresi', 95000, 60, 'Pelindung lutut kompresi untuk dukungan otot optimal saat bermain basket.'],
            ['Pelindung Lutut Voli Busa Tebal', 80000, 70, 'Pelindung lutut voli dengan bantalan busa tebal untuk meredam benturan.'],
            ['Pelindung Lutut Motor Touring', 200000, 30, 'Pelindung lutut khusus motor untuk keamanan ekstra saat touring.'],
            ['Pelindung Lutut Patella Support', 110000, 50, 'Pelindung lutut dengan dukungan patella untuk masalah lutut tertentu.'],
            ['Pelindung Lutut Futsal Elastis', 75000, 65, 'Pelindung lutut futsal yang elastis dan nyaman untuk kebebasan bergerak.'],
            ['Pelindung Lutut Anak Sepeda', 60000, 80, 'Pelindung lutut anak untuk keamanan saat bersepeda atau skateboard.'],
            ['Pelindung Lutut Stabilizer Sendi', 150000, 40, 'Pelindung lutut dengan stabilizer sendi untuk pemulihan cedera atau pencegahan.'],
            ['Pelindung Lutut Gym Angkat Berat', 120000, 45, 'Pelindung lutut kuat untuk dukungan maksimal saat mengangkat beban berat.'],
        ];
        foreach ($pelindungLututProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/olahraga/pelindungLutut/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/olahraga/pelindungLutut/{$slug}.{$ext}";

            Product::create([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'subcategory_id' => optional($pelindung_lutut)->id,
                'image_url' => $img,
                'description' => $desc,
            ]);
        }

        // === Raket ===
        $raketProducts = [
            ['Raket Badminton Karbon Ringan', 450000, 30, 'Raket badminton full karbon ringan untuk pukulan cepat dan bertenaga.'],
            ['Raket Tennis Profesional Graphite', 900000, 15, 'Raket tenis profesional berbahan graphite untuk kontrol dan power maksimal.'],
            ['Raket Squash Titanium', 600000, 20, 'Raket squash titanium yang kuat dan presisi untuk permainan cepat.'],
            ['Raket Tenis Meja Blade Carbon', 250000, 40, 'Raket tenis meja dengan blade karbon untuk kecepatan dan spin tinggi.'],
            ['Raket Bulutangkis Pemula', 180000, 50, 'Raket bulutangkis yang ideal untuk pemula dengan harga terjangkau.'],
            ['Raket Tennis Anak-Anak Aluminium', 300000, 35, 'Raket tenis anak-anak berbahan aluminium, ringan dan mudah dikuasai.'],
            ['Senar Raket Badminton Yonex', 70000, 80, 'Senar raket badminton Yonex untuk kekuatan dan kontrol pukulan.'],
            ['Tas Raket Badminton Muat 6', 200000, 25, 'Tas raket badminton yang mampu menampung hingga 6 raket dan perlengkapan lainnya.'],
        ];
        foreach ($raketProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/olahraga/raket/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/olahraga/raket/{$slug}.{$ext}";

            Product::create([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'subcategory_id' => optional($raket)->id,
                'image_url' => $img,
                'description' => $desc,
            ]);
        }

        // === Sepatu Olah Raga ===
        $sepatuOlahRagaProducts = [
            ['Sepatu Lari Responsif', 750000, 25, 'Sepatu lari dengan bantalan responsif siap temani setiap langkahmu.'],
            ['Sepatu Basket High-Top', 900000, 20, 'Sepatu high-top ini memberikan stabilitas dan cengkraman maksimal di lapangan.'],
            ['Sepatu Futsal Kontrol Optimal', 450000, 35, 'Kontrol bola optimal dengan sepatu futsal yang dirancang untuk kecepatan.'],
            ['Sepatu Fitness Serbaguna', 600000, 30, 'Sepatu serbaguna ini mendukungmu dalam setiap jenis latihan gym.'],
            ['Sepatu Badminton Lincah', 520000, 28, 'Gerakan lincahmu didukung penuh sepatu badminton yang responsif ini.'],
            ['Sepatu Tennis Cengkeram Kuat', 850000, 22, 'Sepatu tennis dengan daya cengkeram tinggi untuk performa terbaik di lapangan.'],
            ['Sepatu Kasual Olahraga', 150000, 70, 'Sepatu ringan dan nyaman, ideal untuk aktivitas olahraga ringan atau latihan dasar.'],
            ['Sepatu Training Crossfit Stabil', 700000, 27, 'Sepatu stabil dan fleksibel untuk menaklukkan setiap tantangan crossfit.'],
        ];
        foreach ($sepatuOlahRagaProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/olahraga/sepatuOlahRaga/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/olahraga/sepatuOlahRaga/{$slug}.{$ext}";

            Product::create([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'subcategory_id' => optional($sepatu_olahraga)->id,
                'image_url' => $img,
                'description' => $desc,
            ]);
        }

        // === Sepeda ===
        $sepedaProducts = [
            ['Sepeda Gunung Hardtail 29"', 5000000, 10, 'Sepeda gunung hardtail 29 inci dengan suspensi depan untuk medan off-road.'],
            ['Sepeda Lipat Urban 20"', 3500000, 15, 'Sepeda lipat ringkas 20 inci, ideal untuk komuter perkotaan.'],
            ['Sepeda Balap Road Bike Karbon', 15000000, 5, 'Sepeda balap road bike full karbon untuk kecepatan dan performa maksimal di jalan raya.'],
            ['Sepeda Anak Balance Bike', 800000, 20, 'Sepeda anak tanpa pedal untuk melatih keseimbangan sebelum menggunakan sepeda roda dua.'],
            ['Sepeda Listrik Lipat Ringkas', 7000000, 8, 'Sepeda listrik lipat yang praktis untuk perjalanan jauh tanpa lelah.'],
            ['Sepeda Fixie Single Speed', 2800000, 12, 'Sepeda fixie single speed dengan desain minimalis untuk gaya urban.'],
            ['Helm Sepeda Aerodinamis', 400000, 30, 'Helm sepeda aerodinamis dengan ventilasi baik untuk keamanan dan kenyamanan.'],
            ['Pompa Sepeda Portable', 120000, 40, 'Pompa sepeda portabel yang ringkas, wajib dibawa saat bersepeda.'],
        ];
        foreach ($sepedaProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/olahraga/sepeda/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/olahraga/sepeda/{$slug}.{$ext}";

            Product::create([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'subcategory_id' => optional($sepeda)->id,
                'image_url' => $img,
                'description' => $desc,
            ]);
        }

        // === Skateboard ===
        $skateboardProducts = [
            ['Skateboard Cruiser Maple Deck', 700000, 25, 'Skateboard cruiser dengan dek maple 7 lapis, cocok untuk melaju di kota.'],
            ['Skateboard Trick Professional', 850000, 20, 'Skateboard trick profesional dengan concave ideal untuk trik ollie dan flip.'],
            ['Longboard Freeride Premium', 1500000, 10, 'Longboard freeride premium untuk kecepatan dan sliding yang mulus.'],
            ['Skateboard Elektrik Remote Control', 4000000, 5, 'Skateboard elektrik dengan remote control, pengalaman berseluncur modern.'],
            ['Griptape Skateboard Anti-Slip', 70000, 60, 'Griptape skateboard anti-slip untuk cengkraman kaki yang kuat.'],
            ['Roda Skateboard High Rebound', 150000, 40, 'Set roda skateboard high rebound untuk kecepatan dan kehalusan melaju.'],
            ['Tools Skateboard Multifungsi', 90000, 50, 'Alat multifungsi untuk merakit dan menyetel skateboardmu.'],
            ['Skateboard Pemula Set Lengkap', 500000, 30, 'Skateboard lengkap untuk pemula, siap digunakan langsung dari kotak.'],
        ];
        foreach ($skateboardProducts as [$name, $price, $stock, $desc]) {
            $slug = Str::slug($name);
            $ext  = file_exists(public_path("images/olahraga/skateboard/{$slug}.jpg")) ? 'jpg' : 'jpeg';
            $img  = "/images/olahraga/skateboard/{$slug}.{$ext}";

            Product::create([
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'subcategory_id' => optional($skateboard)->id,
                'image_url' => $img,
                'description' => $desc,
            ]);
        }
        // Informasi selesai seeding
        $this->command->info('Seeding produk selesai! Total produk: ' . Product::count());         
    }
}