<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil!</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full text-center">
        <div class="text-green-500 text-6xl mb-6">
            &#10004;
        </div>
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Pembayaran Berhasil!</h1>
        <p class="text-gray-600 text-lg mb-8">Terima kasih atas pesanan Anda. Pesanan Anda dengan ID #{{ $order->id }} telah berhasil dibayar.</p>
        <div class="space-y-4">
            <a href="{{ route('home') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors duration-300">Kembali ke Beranda</a>
            <a href="{{ route('orders.show', $order->id) }}" class="inline-block bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 transition-colors duration-300">Lihat Detail Pesanan</a>
        </div>
    </div>
</body>
</html>
