<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }} - Detail Produk</title>
    <style>
        /* (Anda bisa copy-paste style dari homepage jika perlu) */
        body { font-family: system-ui, sans-serif; background-color: #f4f5f7; margin: 0; }
        header { background-color: #fff; padding: 1rem 2rem; border-bottom: 1px solid #e0e0e0; display: flex; justify-content: space-between; align-items: center; }
        header .logo { font-size: 1.5rem; font-weight: bold; }
        header .logo a { text-decoration: none; color: inherit; }
        .container { max-width: 1000px; margin: 2rem auto; padding: 1rem; background-color: #fff; display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .product-image img { width: 100%; border-radius: 8px; }
        .product-details h1 { margin-top: 0; }
        .product-details .price { font-size: 2rem; color: #e44d26; font-weight: bold; margin: 1rem 0; }
        .product-details .stock { color: #555; margin-bottom: 1.5rem; }
        .product-details .description { line-height: 1.6; color: #333; }
        .action-button {
            display: block;
            width: 100%;
            padding: 1rem;
            margin-top: 2rem;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            background-color: #2a9d8f;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo"><a href="{{ route('home') }}">TokoClone</a></div>
        {{-- (Navigasi user bisa ditambahkan di sini jika perlu) --}}
    </header>

    <main class="container">
        <div class="product-image">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
        </div>

        <div class="product-details">
            <h1>{{ $product->name }}</h1>
            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="stock">Stok: {{ $product->stock }}</p>
            
            <div class="description">
                <h3>Deskripsi Produk</h3>
                <p>{{ $product->description }}</p>
            </div>
            
            {{-- TOMBOL TAMBAH KE KERANJANG --}}
            <form action="{{ route('cart.store') }}" method="POST">
                 @csrf
                 <input type="hidden" name="product_id" value="{{ $product->id }}">
                 <button type="submit" class="action-button">+ Tambah ke Keranjang</button>
                 </form>
        </div>
    </main>
</body>
</html>