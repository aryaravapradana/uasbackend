<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage - Tokopedia Clone</title>
    <style>
        body { 
            font-family: system-ui, -apple-system, sans-serif; 
            background-color: #f4f5f7;
            margin: 0;
        }

        header {
            background-color: #fff;
            padding: 1rem 2rem;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        header .logo { font-size: 1.5rem; font-weight: bold; }
        header .user-nav { display: flex; align-items: center; gap: 1rem; }
        header .user-nav form { margin: 0; }
        header .user-nav button {
            background: none;
            border: 1px solid #e3342f;
            color: #e3342f;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
        header .user-nav button:hover { background-color: #e3342f; color: #fff; }

        .container { max-width: 1200px; margin: 2rem auto; padding: 0 1rem; }
        h1 { text-align: center; color: #333; }

        /* Search Form Style */
        .search-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .search-wrapper form {
            display: flex;
            width: 60%;
            max-width: 600px;
        }

        .search-wrapper input[type="text"] {
            flex: 1;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
            outline: none;
        }

        .search-wrapper button {
            padding: 0.75rem 1.5rem;
            background-color: #2f80ed;
            color: white;
            border: none;
            font-weight: bold;
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
            cursor: pointer;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .product-card {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            text-align: left;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .product-card img {
            width: 100%;
            height: auto;
            aspect-ratio: 4/3;
            object-fit: cover;
            display: block;
        }

        .product-info {
            padding: 1rem;
        }

        .product-info h3 {
            margin: 0 0 0.5rem 0;
            font-size: 1.1rem;
            color: #333;
        }

        .product-info .price {
            color: #e44d26;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .product-card-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">Tokopedia</div>
        <nav class="user-nav">
        <a href="{{ route('cart.index') }}">🛒</a> {{-- <<== Tambahan Link ke Halaman Keranjang --}}
            @auth
                <span>Selamat datang, {{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </nav>
    </header>

    <main class="container">

        <!-- FORM SEARCH PRODUK (TENGAH ATAS) -->
        <div class="search-wrapper">
            <form action="{{ route('product.search') }}" method="GET">
                <input type="text" name="q" placeholder="Cari produk..." required>
                <button type="submit">Cari</button>
            </form>
        </div>

        <h1>Produk Terbaru</h1>

        <div class="product-grid">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product) }}" class="product-card-link">
                    <div class="product-card">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>
                            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </main>

</body>
</html>
