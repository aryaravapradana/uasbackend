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
        }

        h1 {
            color: red;
        }

        .result-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .product-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
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
            font-weight: bold;
            color: #e44d26;
        }
    </style>
</head>
<body>

    <h1>INI VIEW SEARCH</h1>
    <p class="result-title">Query: {{ $query }}</p>

    @if($products->isEmpty())
        <p>Tidak ada produk ditemukan.</p>
    @else
        <div class="product-grid">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product) }}" class="product-card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    <div class="product-info">
                        <h3>{{ $product->name }}</h3>
                        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif

</body>
</html>
