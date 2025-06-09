<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan #{{ $order->id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Detail Pesanan #{{ $order->id }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div>
                <h2 class="text-xl font-semibold text-gray-700 mb-3">Informasi Pesanan</h2>
                <p class="text-gray-600 mb-2"><span class="font-medium">Status:</span> <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $order->status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">{{ strtoupper($order->status) }}</span></p>
                <p class="text-gray-600 mb-2"><span class="font-medium">Tanggal Pesan:</span> {{ $order->created_at->format('d M Y H:i') }}</p>
                <p class="text-gray-600 mb-2"><span class="font-medium">Total Jumlah:</span> <span class="font-bold text-indigo-600">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span></p>
                <p class="text-gray-600 mb-2"><span class="font-medium">Metode Pembayaran:</span> {{ $order->payment->method ?? 'N/A' }}</p>
                <p class="text-gray-600 mb-2"><span class="font-medium">Status Pembayaran:</span> <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $order->payment->status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">{{ strtoupper($order->payment->status ?? 'N/A') }}</span></p>
                <p class="text-gray-600 mb-2"><span class="font-medium">ID Transaksi:</span> {{ $order->payment->transaction_id ?? 'N/A' }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold text-gray-700 mb-3">Informasi Pengiriman</h2>
                <p class="text-gray-600 mb-2"><span class="font-medium">Alamat:</span> {{ $order->address }}</p>
                <p class="text-gray-600 mb-2"><span class="font-medium">Telepon:</span> {{ $order->phone }}</p>
                @if($order->notes)
                    <p class="text-gray-600 mb-2"><span class="font-medium">Catatan:</span> {{ $order->notes }}</p>
                @endif
            </div>
        </div>

        <h2 class="text-xl font-semibold text-gray-700 mb-4 border-t pt-6">Item Pesanan</h2>
        @if($order->items->isEmpty())
            <p class="text-gray-600">Tidak ada item dalam pesanan ini.</p>
        @else
            <div class="space-y-4">
                @foreach ($order->items as $item)
                    <div class="flex items-center space-x-4 border p-4 rounded-lg bg-gray-50">
                        <img src="{{ $item->product->image_url ?? 'https://placehold.co/80x80/cccccc/333333?text=Produk' }}" alt="{{ $item->product->name ?? 'Produk' }}" class="w-20 h-20 object-cover rounded-md">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $item->product->name ?? 'Produk Tidak Ditemukan' }}</h3>
                            <p class="text-gray-600 text-sm">Jumlah: {{ $item->quantity }}</p>
                            <p class="text-gray-600 text-sm">Harga Satuan: Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="text-right">
                            <span class="text-lg font-bold text-indigo-600">Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors duration-300">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
