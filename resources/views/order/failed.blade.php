<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Gagal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full text-center">
        <div class="text-red-500 text-6xl mb-6">
            &#10060;
        </div>
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Pembayaran Gagal</h1>
        <p class="text-gray-600 text-lg mb-8">Maaf, pembayaran untuk pesanan Anda dengan ID #{{ $order->id }} tidak berhasil diproses. Silakan coba lagi.</p>
        <div class="space-y-4">
            <a href="{{ route('cart.index') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors duration-300">Coba Pembayaran Lagi</a>
            <a href="{{ route('home') }}" class="inline-block bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors duration-300">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
<!-- Ui Failed ini tidak akan kepakai untuk dummy gateway, dikarenakan tidak ada a real way to implement it in our project  -–>