<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pencarian</title>
    <style>
        body {
            font-family: system-ui, sans-serif;
            background-color: #f5f5f5;
            padding: 2rem;
            margin: 0;
        }

        h1 {
            color: #d62828;
            font-weight: bold;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .result-title {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .product-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            text-decoration: none;
            color: inherit;
            transition: transform 0.2s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background-color: #f0f0f0;
        }

        .product-info {
            padding: 1rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-info h3 {
            margin: 0 0 0.5rem 0;
            font-size: 1.1rem;
            color: #222;
        }

        .price {
            color: #e63946;
            font-weight: bold;
            margin-bottom: 0.25rem;
        }

        .meta {
            font-size: 0.85rem;
            color: #666;
        }

        .empty {
            font-size: 1.1rem;
            color: #888;
            margin-top: 3rem;
        }
    </style>
</head>
<body>

    <h1>Hasil Pencarian</h1>
    <p class="result-title">Query: <strong>{{ $query }}</strong></p>

    @if($products->isEmpty())
        <p class="empty">Tidak ada produk ditemukan.</p>
    @else
        <div class="product-grid">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product) }}" class="product-card">
                    <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}">

                    <div class="product-info">
                        <h3>{{ $product->name }}</h3>
                        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="meta">
                            {{ $product->subcategory?->category?->name ?? '-' }} /
                            {{ $product->subcategory?->name ?? '-' }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif

</body>
</html>
