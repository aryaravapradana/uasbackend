<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokoClone - Jual Beli Mudah, Dari Rumah</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/avatar.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        :root {
            --primary-green: #4F9D4D;
            --primary-green-dark: #418240;
            --background-color: #F3F4F6;
            --card-color: #ffffff;
            --text-dark: #1F2937;
            --text-muted: #6B7280;
            --border-color: #E5E7EB;
            --white: #FFFFFF;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--background-color);
            color: var(--text-dark);
        }

        a { text-decoration: none; color: inherit; }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .scroll-horizontal.active {
            cursor: grabbing;
        }

        .scroll-horizontal {
            cursor: grab;
            user-select: none;
        }
        .scroll-horizontal.active {
            cursor: grabbing;
        }

        .product-slider-section {
            margin-top: 2rem;
            position: relative;
        }

        .section-title {
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            border-bottom: 2px solid #4F9D4D;
            display: inline-block;
        }

        .slider-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .scroll-horizontal {
            display: flex;
            overflow-x: auto;
            gap: 1rem;
            padding-bottom: 1rem;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            cursor: grab;
            scroll-behavior: smooth;
        }

        .scroll-horizontal::-webkit-scrollbar {
            height: 6px;
        }

        .scroll-horizontal {
            display: flex;
            overflow-x: auto;
            gap: 1.25rem; 
            padding: 1rem 0;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            scroll-behavior: smooth;
        }

        .product-card {
            min-width: 280px;
            max-width: 280px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            scroll-snap-align: start;
            flex-shrink: 0;
            text-decoration: none;
            color: inherit;
            transition: transform 0.2s ease;
        }

        .product-card:hover {
            transform: scale(1.02);
        }

        .product-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .product-info {
            padding: 0.75rem;
        }

        .product-name {
            font-size: 0.95rem;
            color: #111827;
            margin-bottom: 0.5rem;
        }

        .product-price {
            font-weight: bold;
            color: #10b981;
            margin: 0;
        }

        .product-stock {
            font-size: 0.75rem;
            color: #6b7280;
        }

        .slider-btn {
            position: absolute;
            top: 40%;
            transform: translateY(-50%);
            background-color: #ffffffcc;
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            cursor: pointer;
            font-size: 1.2rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            z-index: 2;
        }

        .slider-btn:hover {
            background-color: #e5e7eb;
        }

        .slider-btn.left {
            left: -18px;
        }

        .slider-btn.right {
            right: -18px;
        }

        .main-header {
            background-color: var(--white);
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .main-header .logo { height: 40px; }
        .search-bar { flex: 1; max-width: 600px; margin: 0 2rem; }
        .search-bar form { display: flex; }
        .search-bar input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px 0 0 8px;
            font-size: 1rem;
            font-family: 'Nunito', sans-serif;
        }
        .search-bar input:focus { outline: 2px solid var(--primary-green); z-index: 1; }
        .search-bar button {
            padding: 0.75rem 1.5rem;
            border: none;
            background-color: var(--primary-green);
            color: white;
            border-radius: 0 8px 8px 0;
            cursor: pointer;
            font-weight: 700;
        }
        .user-nav { display: flex; align-items: center; gap: 1.5rem; }
        .user-nav a, .user-nav button {
            color: var(--text-muted);
            font-weight: 700;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            font-family: 'Nunito', sans-serif;
            transition: color 0.2s;
        }
        .user-nav a:hover, .user-nav button:hover { color: var(--primary-green); }
        .user-nav .btn-register {
            background-color: var(--primary-green);
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            transition: background-color 0.2s;
        }
        .user-nav .btn-register:hover { background-color: var(--primary-green-dark); }

        .container { max-width: 1400px; margin: 0 auto; padding: 2rem 5%; }
        section { margin-bottom: 4rem; }
        section h2 { font-size: 2rem; font-weight: 800; margin-bottom: 1.5rem; border-bottom: 3px solid var(--primary-green); display: inline-block; padding-bottom: 0.5rem; }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1.5rem;
        }
        .category-item {
            background-color: var(--white);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .category-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            color: var(--primary-green);
        }
        .category-item .icon { font-size: 2.5rem; margin-bottom: 1rem; color: var(--primary-green); }

        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1.5rem; }
        .product-card {
            background-color: var(--white);
            border-radius: 12px;
            border: 1px solid var(--border-color);
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            position: relative;
            transition: all 0.3s ease;
        }
        .product-card:hover { transform: translateY(-8px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .product-image { width: 100%; aspect-ratio: 1/1; overflow: hidden; }
        .product-image img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; }
        .product-card:hover .product-image img { transform: scale(1.05); }
        .product-info { padding: 1rem; }
        .product-info h3 { font-size: 1.1rem; margin: 0 0 0.5rem 0; font-weight: 600; }
        .product-info .price { font-size: 1.25rem; font-weight: 800; color: var(--primary-green); }
        .product-overlay {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0.2));
            color: white;
            display: flex; flex-direction: column; justify-content: flex-end;
            padding: 1rem; text-align: left;
            opacity: 0; transition: opacity 0.4s ease;
        }
        .product-card:hover .product-overlay { opacity: 1; }
        .overlay-content { transform: translateY(20px); transition: transform 0.4s ease; }
        .product-card:hover .overlay-content { transform: translateY(0); }
        .overlay-content .category { font-size: 0.8rem; background-color: var(--primary-green); padding: 4px 8px; border-radius: 4px; display: inline-block; margin-bottom: 0.5rem; }
        .overlay-content .stock { font-size: 1rem; font-weight: 700; }
    </style>
</head>
<body>
    <header class="main-header">
        <div class="navbar-container">
        <div style="display: flex; align-items: center; gap: 1.5rem; width: 100%;">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/Tokopedia_Mascot.png') }}" alt="TokoClone Logo" class="logo">
            </a>
            @php
                $categoryIcons = [
                    'Elektronik' => 'fa-laptop',
                    'Fashion' => 'fa-tshirt',
                    'Rumah Tangga' => 'fa-couch',
                    'Olahraga' => 'fa-futbol',
                    'Hobi' => 'fa-gamepad',
                    'Kecantikan' => 'fa-gem',
                ];
            @endphp
            @include('components.kategori-dropdown')
            <div class="search-bar" style="flex: 1; max-width: 600px; margin-left: 2rem;">
                <form action="{{ route('products.search') }}" method="GET" style="display: flex;">
                    <input type="text" name="query" placeholder="Cari di TokoClone"
                        style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #E5E7EB; border-radius: 8px 0 0 8px;">
                    <button type="submit"
                        style="padding: 0.75rem 1.5rem; background-color: #4F9D4D; color: white; border-radius: 0 8px 8px 0;">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <nav class="user-nav">
                @auth
                    <a href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                    {{-- Tambahkan tautan Riwayat Pesanan di sini --}}
                    <a href="{{ route('order.history') }}" style="color: var(--text-muted); font-weight: 700; transition: color 0.2s;">
                        Riwayat Pesanan
                    </a>
                    <div class="user-profile-wrapper">
                        <span class="user-name">
                            {{ auth()->user()->name }}
                        </span>
                        @if (auth()->user()->photo)
                            <img src="{{ asset('storage/' . auth()->user()->photo) }}"
                                alt="avatar"
                                class="user-avatar-img">
                        @else
                            <div class="user-avatar-default">
                                {{ auth()->user()->initial }}
                            </div>
                        @endif
                    </div>
                    <form action="{{ route('logout') }}" method="POST" style="margin-left: 0.5rem;">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Masuk</a>
                    <a href="{{ route('register') }}" class="btn-register">Daftar</a>
                @endauth
            </nav>
        </div>
    </header>
    <main class="container">
        <section class="categories">
            <h2>Kategori</h2>
            <div class="category-grid">
                @php
                    $categories = [
                        ['name' => 'Elektronik', 'icon' => 'fa-laptop'],
                        ['name' => 'Fashion', 'icon' => 'fa-tshirt'],
                        ['name' => 'Rumah Tangga', 'icon' => 'fa-couch'],
                        ['name' => 'Olahraga', 'icon' => 'fa-futbol'],
                        ['name' => 'Hobi', 'icon' => 'fa-gamepad'],
                        ['name' => 'Kecantikan', 'icon' => 'fa-gem'],
                    ];
                @endphp
                @foreach($categories as $category)
                    <a href="#" class="category-item">
                        <div class="icon"><i class="fas {{ $category['icon'] }}"></i></div>
                        <span>{{ $category['name'] }}</span>
                    </a>
                @endforeach
            </div>
        </section>
        <section class="product-slider-section">
    <h2 class="section-title">Rekomendasi Untukmu</h2>

    <div class="slider-wrapper">
        <button class="slider-btn left" onclick="scrollProducts(-1)">&#10094;</button>

        <div id="rekomendasiContainer" class="scroll-horizontal">
            @foreach ($recommended as $product)
                <a href="{{ route('products.show', $product) }}" class="product-card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image">

                    <div class="product-info">
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <p class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="product-stock">Stok: {{ $product->stock }}</p>
                    </div>
                </a>
            @endforeach
        </div>

        <button class="slider-btn right" onclick="scrollProducts(1)">&#10095;</button>
    </div>
</section>
</main>
<script src="{{ asset('js/kategori.js') }}"></script>
<script src="{{ asset('js/scroll-drag.js') }}"></script>
</body>
</html>
