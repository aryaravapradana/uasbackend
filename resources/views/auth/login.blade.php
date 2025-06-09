<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    {{-- Sedikit styling agar form login terlihat rapi di tengah halaman --}}
    <style>
        body { 
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; 
            display: grid; 
            place-content: center; 
            min-height: 100vh; 
            background-color: #f4f5f7;
            margin: 0;
        }
        .login-card { 
            background-color: #fff;
            padding: 2rem; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); 
            border-radius: 8px; 
            width: 350px; 
        }
        .login-card h2 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 1.5rem;
            color: #333;
        }
        .form-group { 
            margin-bottom: 1rem; 
        }
        .form-group label { 
            display: block; 
            margin-bottom: 0.5rem; 
            color: #555;
        }
        .form-group input { 
            width: 100%; 
            padding: 0.75rem; 
            border: 1px solid #ccc; 
            border-radius: 4px;
            box-sizing: border-box; /* Menambahkan ini agar padding tidak membuat lebar melebihi 100% */
        }
        .error-message { 
            color: #e3342f; 
            font-size: 0.875rem; 
            margin-top: 1rem;
            text-align: center;
            background-color: #fcebea;
            padding: 0.75rem;
            border-radius: 4px;
        }
        button { 
            width: 100%; 
            padding: 0.75rem; 
            background-color: #03AC0E; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            font-size: 1rem;
            font-weight: bold;
        }
        button:hover {
            background-color: #02820B;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Login ke Akun Anda</h2>
        <form action="/login" method="POST">
            @csrf  

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
            <button type="submit">Login</button>
        </form>
        {{-- Kode ini untuk ngelink ke register --}}
        <div class="register-link">
            Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang!</a>
        </div>
        
    </div>
</body>
</html>