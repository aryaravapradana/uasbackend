<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f8f8;
            color: #333;
            text-align: center;
            flex-direction: column;
        }
        .container {
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 5em;
            margin-bottom: 10px;
            color: #e74c3c;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
        a {
            color: #3498db;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <p>Maaf, halaman yang Anda cari tidak ditemukan.</p>
        <p>Sepertinya Anda mencoba mengakses halaman yang tidak ada atau telah dihapus.</p>
        <p><a href="{{ url('/') }}">Kembali ke Halaman Utama</a></p>
    </div>
</body>
</html>