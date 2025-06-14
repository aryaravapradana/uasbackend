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
        <section class="products">
            <h2>Rekomendasi Untukmu</h2>
            <div class="product-grid">
                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="product-card">
                        <div class="product-image">
                            <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300' }}" alt="{{ $product->name }}">
                        </div>
                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>
                            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <p class="stock">Stok: {{ $product->stock }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>Tidak ada produk untuk ditampilkan.</p>
                @endforelse
            </div>
        </section>
    </main>
    <script src="{{ asset('js/kategori.js') }}"></script>
</body>
</html>
