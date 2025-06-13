<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 py-8">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Riwayat Pesanan Saya</h1>

        @if($orders->isEmpty())
            <p class="text-center text-gray-600 text-lg">Anda belum memiliki riwayat pesanan.</p>
        @else
            <div class="space-y-6">
                @foreach ($orders as $order)
                    <div class="border border-gray-200 rounded-lg p-6 bg-gray-50 shadow-sm">
                        <div class="flex justify-between items-center mb-4 border-b pb-3">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Pesanan #{{ $order->id }}</h2>
                                <p class="text-sm text-gray-600">Tanggal: {{ $order->created_at->format('d M Y H:i') }}</p>
                            </div>
                            <div class="text-right">
                                <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $order->status === 'paid' ? 'bg-green-100 text-green-800' : ($order->status === 'unpaid' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ strtoupper($order->status) }}
                                </span>
                                <p class="text-lg font-bold text-indigo-600 mt-1">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <h3 class="text-lg font-medium text-gray-700 mb-3">Item Pesanan:</h3>
                        <ul class="list-disc list-inside text-gray-600 mb-4 space-y-1">
                            @foreach ($order->items as $item)
                                <li>
                                    {{ $item->product->name ?? 'Produk Tidak Ditemukan' }} ({{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }})
                                </li>
                            @endforeach
                        </ul>
                        
                        <div class="text-right">
                            <a href="{{ route('orders.show', $order->id) }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors duration-300 text-sm">Lihat Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 flex justify-center">
                {{ $orders->links() }}
            </div>
        @endif

        <div class="text-center mt-8">
            <a href="{{ route('home') }}" class="inline-block bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors duration-300">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
