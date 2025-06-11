<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tokopedia Final Project</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <main class="auth-container">
        
        <section class="info-panel">
            <div class="info-content">
                <img src="{{ asset('images/Tokopedia_Mascot.png') }}" alt="Tokopedia Logo" class="logo">
                <h1>Selamat Datang Kembali!</h1>
                <div class="project-info">
                    Masuk untuk melanjutkan petualangan belanjamu di TokoClone.
                </div>
            </div>
        </section>

        <section class="form-panel">
            <div class="form-content">
                <h2>Login</h2>
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" required>
                            <i class="fa-solid fa-eye" id="toggle-password"></i>
                        </div>
                    </div>

                    @error('email')
                        <p style="color: red; margin-bottom: 1rem;">{{ $message }}</p>
                    @enderror
                    
                    <button type="submit" class="login-button">Masuk</button>
                </form>

                <div class="form-footer">
                    <p>Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang!</a></p>
                </div>
            </div>
        </section>

    </main>
    
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>