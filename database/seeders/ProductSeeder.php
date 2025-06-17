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
        $kompor     = SubCategory::where('slug', 'kompor')->first();
        $dispenser  = SubCategory::where('slug', 'dispenser')->first();
        $meja       = SubCategory::where('slug', 'meja')->first();
        $kursi      = SubCategory::where('slug', 'kursi')->first();
        $lemari     = SubCategory::where('slug', 'lemari')->first();
        $lampu      = SubCategory::where('slug', 'lampu')->first();
        $kipas      = SubCategory::where('slug', 'kipas')->first();
        $kasur      = SubCategory::where('slug', 'kasur')->first();
        $baju       = SubCategory::where('slug', 'baju')->first();
        $celana     = SubCategory::where('slug', 'celana')->first();
        $sepatu     = SubCategory::where('slug', 'sepatu')->first();
        $jaket      = SubCategory::where('slug', 'jaket')->first();
        $topi       = SubCategory::where('slug', 'topi')->first();
        $sandal     = SubCategory::where('slug', 'sandal')->first();
        $kemeja     = SubCategory::where('slug', 'kemeja')->first();
        $dress      = SubCategory::where('slug', 'dress')->first();
        $kaos       = SubCategory::where('slug', 'kaos')->first();
        $aksesoris  = SubCategory::where('slug', 'aksesoris')->first();

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
        // === Kompor ===
        if ($kompor) {
            $products = [
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
            foreach ($products as [$name, $price, $stock, $desc]) { $slug = Str::slug($name); $ext = file_exists(public_path("images/kompor/{$slug}.jpg")) ? 'jpg' : 'jpeg'; $img = "/images/kompor/{$slug}.{$ext}"; Product::create(['name' => $name, 'price' => $price, 'stock' => $stock, 'subcategory_id' => $kompor->id, 'image_url' => $img, 'description' => $desc]); }
        }

        // === Meja ===
        if ($meja) {
            $products = [
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
            foreach ($products as [$name, $price, $stock, $desc]) { $slug = Str::slug($name); $ext = file_exists(public_path("images/meja/{$slug}.jpg")) ? 'jpg' : 'jpeg'; $img = "/images/meja/{$slug}.{$ext}"; Product::create(['name' => $name, 'price' => $price, 'stock' => $stock, 'subcategory_id' => $meja->id, 'image_url' => $img, 'description' => $desc]); }
        }

        // === Kursi ===
        if ($kursi) {
            $products = [
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
            foreach ($products as [$name, $price, $stock, $desc]) { $slug = Str::slug($name); $ext = file_exists(public_path("images/kursi/{$slug}.jpg")) ? 'jpg' : 'jpeg'; $img = "/images/kursi/{$slug}.{$ext}"; Product::create(['name' => $name, 'price' => $price, 'stock' => $stock, 'subcategory_id' => $kursi->id, 'image_url' => $img, 'description' => $desc]); }
        }

        // === Lemari ===
        if ($lemari) {
            $products = [
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
            foreach ($products as [$name, $price, $stock, $desc]) { $slug = Str::slug($name); $ext = file_exists(public_path("images/lemari/{$slug}.jpg")) ? 'jpg' : 'jpeg'; $img = "/images/lemari/{$slug}.{$ext}"; Product::create(['name' => $name, 'price' => $price, 'stock' => $stock, 'subcategory_id' => $lemari->id, 'image_url' => $img, 'description' => $desc]); }
        }
        
        // === Lampu ===
        if ($lampu) {
            $products = [
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
            foreach ($products as [$name, $price, $stock, $desc]) { $slug = Str::slug($name); $ext = file_exists(public_path("images/lampu/{$slug}.jpg")) ? 'jpg' : 'jpeg'; $img = "/images/lampu/{$slug}.{$ext}"; Product::create(['name' => $name, 'price' => $price, 'stock' => $stock, 'subcategory_id' => $lampu->id, 'image_url' => $img, 'description' => $desc]); }
        }

        // === Kipas Angin ===
        if ($kipas) {
            $products = [
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
            foreach ($products as [$name, $price, $stock, $desc]) { $slug = Str::slug($name); $ext = file_exists(public_path("images/kipas/{$slug}.jpg")) ? 'jpg' : 'jpeg'; $img = "/images/kipas/{$slug}.{$ext}"; Product::create(['name' => $name, 'price' => $price, 'stock' => $stock, 'subcategory_id' => $kipas->id, 'image_url' => $img, 'description' => $desc]); }
        }

        // === Kasur ===
        if ($kasur) {
            $products = [
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
            foreach ($products as [$name, $price, $stock, $desc]) { $slug = Str::slug($name); $ext = file_exists(public_path("images/kasur/{$slug}.jpg")) ? 'jpg' : 'jpeg'; $img = "/images/kasur/{$slug}.{$ext}"; Product::create(['name' => $name, 'price' => $price, 'stock' => $stock, 'subcategory_id' => $kasur->id, 'image_url' => $img, 'description' => $desc]); }
        }

        // === Baju ===
        if ($baju) {
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
                $ext  = file_exists(public_path("images/baju/{$slug}.jpg")) ? 'jpg' : 'jpeg';
                $img  = "/images/baju/{$slug}.{$ext}";

                Product::create([
                    'name'           => $name,
                    'price'          => $price,
                    'stock'          => $stock,
                    'subcategory_id' => $baju->id,
                    'image_url'      => $img,
                    'description'    => $desc,
                ]);
            }
        }

        // === Celana ===
        if ($celana) {
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
                $ext  = file_exists(public_path("images/celana/{$slug}.jpg")) ? 'jpg' : 'jpeg';
                $img  = "/images/celana/{$slug}.{$ext}";

                Product::create([
                    'name'           => $name,
                    'price'          => $price,
                    'stock'          => $stock,
                    'subcategory_id' => $celana->id,
                    'image_url'      => $img,
                    'description'    => $desc,
                ]);
            }
        }           

        // === Sepatu ===
        if ($sepatu) {
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
                $ext  = file_exists(public_path("images/sepatu/{$slug}.jpg")) ? 'jpg' : 'jpeg';
                $img  = "/images/sepatu/{$slug}.{$ext}";

                Product::create([
                    'name'           => $name,
                    'price'          => $price,
                    'stock'          => $stock,
                    'subcategory_id' => $sepatu->id,
                    'image_url'      => $img,
                    'description'    => $desc,
                ]);
            }
        }
        // === Jaket ===
        if ($jaket) {
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
                $ext  = file_exists(public_path("images/jaket/{$slug}.jpg")) ? 'jpg' : 'jpeg';
                $img  = "/images/jaket/{$slug}.{$ext}";

                Product::create([
                    'name'           => $name,
                    'price'          => $price,
                    'stock'          => $stock,
                    'subcategory_id' => $jaket->id,
                    'image_url'      => $img,
                    'description'    => $desc,
                ]);
            }
        }

        // === Topi ===
        if ($topi) {
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
                $ext  = file_exists(public_path("images/topi/{$slug}.jpg")) ? 'jpg' : 'jpeg';
                $img  = "/images/topi/{$slug}.{$ext}";

                Product::create([
                    'name'           => $name,
                    'price'          => $price,
                    'stock'          => $stock,
                    'subcategory_id' => $topi->id,
                    'image_url'      => $img,
                    'description'    => $desc,
                ]);
            }
        }   

            // === Sandal ===
        if ($sandal) {
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
                $ext  = file_exists(public_path("images/sandal/{$slug}.jpg")) ? 'jpg' : 'jpeg';
                $img  = "/images/sandal/{$slug}.{$ext}";

                Product::create([
                    'name'           => $name,
                    'price'          => $price,
                    'stock'          => $stock,
                    'subcategory_id' => $sandal->id,
                    'image_url'      => $img,
                    'description'    => $desc,
                ]);
            }
        }

        // === Kemeja ===
        if ($kemeja) {
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
                $ext  = file_exists(public_path("images/kemeja/{$slug}.jpg")) ? 'jpg' : 'jpeg';
                $img  = "/images/kemeja/{$slug}.{$ext}";

                Product::create([
                    'name'           => $name,
                    'price'          => $price,
                    'stock'          => $stock,
                    'subcategory_id' => $kemeja->id,
                    'image_url'      => $img,
                    'description'    => $desc,
                ]);
            }
        }

        // === Dress ===
        if ($dress) {
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
                $ext  = file_exists(public_path("images/dress/{$slug}.jpg")) ? 'jpg' : 'jpeg';
                $img  = "/images/dress/{$slug}.{$ext}";

                Product::create([
                    'name'           => $name,
                    'price'          => $price,
                    'stock'          => $stock,
                    'subcategory_id' => $dress->id,
                    'image_url'      => $img,
                    'description'    => $desc,
                ]);
            }
        }

        // === Kaos ===
        if ($kaos) {
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
                $ext  = file_exists(public_path("images/kaos/{$slug}.jpg")) ? 'jpg' : 'jpeg';
                $img  = "/images/kaos/{$slug}.{$ext}";

                Product::create([
                    'name'           => $name,
                    'price'          => $price,
                    'stock'          => $stock,
                    'subcategory_id' => $kaos->id,
                    'image_url'      => $img,
                    'description'    => $desc,
                ]);
            }
        }

        // === Aksesoris ===
        if ($aksesoris) {
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
                $ext  = file_exists(public_path("images/aksesoris/{$slug}.jpg")) ? 'jpg' : 'jpeg';
                $img  = "/images/aksesoris/{$slug}.{$ext}";

                Product::create([
                    'name'           => $name,
                    'price'          => $price,
                    'stock'          => $stock,
                    'subcategory_id' => $aksesoris->id,
                    'image_url'      => $img,
                    'description'    => $desc,
                ]);
            }
        }

        // Informasi selesai seeding
        $this->command->info('Seeding produk selesai! Total produk: ' . Product::count());         
    }
}