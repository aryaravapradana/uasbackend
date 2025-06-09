<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Saya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            height: 80px;
            object-fit: cover;
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
            min-width: 150px;
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
            border-radius: 5px;
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
            text-decoration: underline;
        }

        .cart-summary {
            border-top: 2px solid #eee;
            padding-top: 20px;
            margin-top: 20px;
            text-align: right;
        }
        .cart-summary .total-amount {
            font-size: 22px;
            font-weight: bold;
            color: #e44d26;
        }
        .checkout-form {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        .checkout-form h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }
        .checkout-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        .checkout-form input[type="text"],
        .checkout-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .checkout-form textarea {
            resize: vertical;
            min-height: 80px;
        }
        .checkout-btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            width: 100%;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
        }
        .checkout-btn:hover {
            background-color: #45a049;
        }
        .flash-message {
            padding: 10px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
        }
        .flash-message.success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
        .flash-message.error {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        @media (max-width: 600px) {
            .cart-item {
                flex-direction: column;
                align-items: flex-start;
            }
            .cart-item img {
                margin-bottom: 10px;
            }
            .cart-details {
                width: 100%;
                margin-bottom: 10px;
            }
            .cart-actions {
                width: 100%;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <div class="cart-title">Keranjang</div>

        @if (session('success'))
            <div class="flash-message success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="flash-message error">
                {{ session('error') }}
            </div>
        @endif

        @if($cartItems->isEmpty())
            <p>Keranjang kamu kosong.</p>
        @else
            @foreach ($cartItems as $item)
                <div class="cart-item">
                    <img src="{{ $item->product->image_url ?? 'https://placehold.co/80x80/cccccc/333333?text=Produk' }}" alt="gambar produk">
                    <div class="cart-details">
                        <h4>{{ $item->product->name ?? 'Produk Tidak Ditemukan' }}</h4>
                        <p>{{ $item->product->description ?? 'Deskripsi tidak tersedia.' }}</p>
                    </div>
                    <div class="cart-actions">
                        <div class="price" id="item-total-{{ $item->id }}">
                            Rp {{ number_format($item->quantity * ($item->product->price ?? 0), 0, ',', '.') }}
                        </div>
                        <div class="qty">
                            <button class="update-qty-btn" data-id="{{ $item->id }}" data-action="decrease">-</button>
                            <span id="quantity-{{ $item->id }}">{{ $item->quantity }}</span>
                            <button class="update-qty-btn" data-id="{{ $item->id }}" data-action="increase">+</button>
                        </div>
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="remove-btn">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="cart-summary">
                <p>Total Belanja:</p>
                <div class="total-amount" id="overall-total-amount">
                    Rp {{ number_format($totalAmount, 0, ',', '.') }}
                </div>
            </div>

            <div class="checkout-form">
                <h3>Informasi Pengiriman</h3>
                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <label for="address">Alamat Lengkap:</label>
                    <textarea id="address" name="address" required>{{ old('address', Auth::user()->address ?? '') }}</textarea>
                    @error('address')
                        <p style="color: red; font-size: 0.8em; margin-top: -10px; margin-bottom: 10px;">{{ $message }}</p>
                    @enderror

                    <label for="phone">Nomor Telepon:</label>
                    <input type="text" id="phone" name="phone" required value="{{ old('phone', Auth::user()->phone ?? '') }}">
                    @error('phone')
                        <p style="color: red; font-size: 0.8em; margin-top: -10px; margin-bottom: 10px;">{{ $message }}</p>
                    @enderror

                    <label for="notes">Catatan (Opsional):</label>
                    <textarea id="notes" name="notes">{{ old('notes') }}</textarea>

                    <button type="submit" class="checkout-btn">Lanjutkan ke Pembayaran</button>
                </form>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]') ? document.querySelector('meta[name="csrf-token"]').content : '';

            document.querySelectorAll('.update-qty-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.dataset.id;
                    const action = this.dataset.action;
                    const quantitySpan = document.getElementById(`quantity-${itemId}`);
                    let currentQuantity = parseInt(quantitySpan.textContent);

                    let newQuantity;
                    if (action === 'increase') {
                        newQuantity = currentQuantity + 1;
                    } else if (action === 'decrease') {
                        newQuantity = currentQuantity - 1;
                        if (newQuantity < 1) {
                            newQuantity = 1;
                        }
                    }

                    fetch(`/cart/${itemId}/update-quantity`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ quantity: newQuantity })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            console.log(data.message);
                            quantitySpan.textContent = data.new_quantity;
                            document.getElementById(`item-total-${itemId}`).textContent = `Rp ${data.new_item_total}`;
                            document.getElementById('overall-total-amount').textContent = `Rp ${data.overall_total_amount}`;
                        } else if (data.error) {
                            console.error('Error:', data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error updating quantity:', error);
                    });
                });
            });
        });
    </script>
</body>
</html>
