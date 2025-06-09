<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Saya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f3f5;
            margin: 0;
            padding: 20px;
        }
        .cart-container {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            max-width: 900px;
            margin: auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .cart-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .cart-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-top: 1px solid #eee;
        }
        .cart-item:first-child {
            border-top: none;
        }
        .cart-item img {
            width: 80px;
            border-radius: 8px;
            margin-right: 20px;
        }
        .cart-details {
            flex: 1;
        }
        .cart-details h4 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }
        .cart-details p {
            margin: 5px 0;
            color: #666;
            font-size: 14px;
        }
        .cart-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        .price {
            font-size: 18px;
            font-weight: bold;
            color: #e44d26;
        }
        .qty {
            margin-top: 10px;
            display: flex;
            gap: 5px;
            align-items: center;
        }
        .qty button {
            padding: 5px 10px;
            border: 1px solid #ccc;
            background: #f9f9f9;
            cursor: pointer;
        }
        .qty span {
            min-width: 20px;
            text-align: center;
        }
        .remove-btn {
            margin-top: 10px;
            font-size: 13px;
            color: red;
            border: none;
            background: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <div class="cart-title">Keranjang</div>

        @if($cartItems->isEmpty())
            <p>Keranjang kamu kosong.</p>
        @else
            @foreach ($cartItems as $item)
                <div class="cart-item">
                    <img src="{{ $item->product->image_url }}" alt="gambar produk">
                    <div class="cart-details">
                        <h4>{{ $item->product->name }}</h4>
                        <p>{{ $item->product->description }}</p>
                    </div>
                    <div class="cart-actions">
                        <div class="price">Rp {{ number_format($item->product->price, 0, ',', '.') }}</div>
                        <div class="qty">
                            <button>-</button>
                            <span>{{ $item->quantity }}</span>
                            <button>+</button>
                        </div>
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-btn">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>