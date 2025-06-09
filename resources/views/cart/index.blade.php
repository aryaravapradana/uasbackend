<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Saya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Keranjang</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md relative mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if($cartItems->isEmpty())
            <p class="text-center text-gray-600 text-lg mb-6">Keranjang kamu kosong.</p>
            <div class="text-center">
                <a href="{{ route('home') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors duration-300">Kembali ke Beranda</a>
            </div>
        @else
            @foreach ($cartItems as $item)
                <div class="flex flex-col sm:flex-row items-start sm:items-center py-4 border-b border-gray-200 last:border-b-0">
                    <img src="{{ $item->product->image_url ?? 'https://placehold.co/80x80/cccccc/333333?text=Produk' }}" alt="gambar produk" class="w-20 h-20 object-cover rounded-lg mr-4 mb-4 sm:mb-0">
                    <div class="flex-1">
                        <h4 class="text-lg font-semibold text-gray-800">{{ $item->product->name ?? 'Produk Tidak Ditemukan' }}</h4>
                        <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{ $item->product->description ?? 'Deskripsi tidak tersedia.' }}</p>
                    </div>
                    <div class="flex flex-col items-end sm:items-end mt-4 sm:mt-0 min-w-[150px]">
                        <div class="text-lg font-bold text-indigo-600" id="item-total-{{ $item->id }}">
                            Rp {{ number_format($item->quantity * ($item->product->price ?? 0), 0, ',', '.') }}
                        </div>
                        <div class="flex items-center space-x-2 mt-2">
                            <button class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-100 update-qty-btn" data-id="{{ $item->id }}" data-action="decrease">-</button>
                            <span id="quantity-{{ $item->id }}" class="w-8 text-center">{{ $item->quantity }}</span>
                            <button class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-100 update-qty-btn" data-id="{{ $item->id }}" data-action="increase">+</button>
                        </div>
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 text-sm hover:underline">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="text-right mt-6 pt-4 border-t-2 border-gray-200">
                <p class="text-lg font-semibold text-gray-700">Total Belanja:</p>
                <div class="text-3xl font-extrabold text-indigo-600" id="overall-total-amount">
                    Rp {{ number_format($totalAmount, 0, ',', '.') }}
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Informasi Pengiriman</h3>
                <form action="{{ route('cart.checkout') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                        <textarea id="address" name="address" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('address', Auth::user()->address ?? '') }}</textarea>
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                        <input type="text" id="phone" name="phone" required value="{{ old('phone', Auth::user()->phone ?? '') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Catatan (Opsional)</label>
                        <textarea id="notes" name="notes" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('notes') }}</textarea>
                    </div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Lanjutkan ke Pembayaran
                    </button>
                </form>
            </div>
            <div class="text-center mt-6">
                <a href="{{ route('home') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors duration-300">Kembali ke Beranda</a>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

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
                    .then(response => {
                        if (!response.ok) {

                            return response.text().then(text => { throw new Error(text || response.statusText) });
                        }
                        return response.json();
                    })
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
