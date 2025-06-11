<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Tokopedia Final Project</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --tokopedia-green: #4F9D4D;
            --tokopedia-green-light: #6aeb67;
            --background-color: #f8f9fa;
            --card-color: #ffffff;
            --text-dark: #31353B;
            --text-muted: #6D7588;
            --border-color: #E5E7EB;
            --white: #FFFFFF;
            --error-color: #e3342f;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--background-color);
            color: var(--text-dark);
            min-height: 100vh;
            overflow: hidden;
        }
        .auth-container {
            display: flex;
            width: 100%; 
            height: 100vh; 
        }
        .info-panel {
            flex: 1;
            background-color: transparent;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .info-panel::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            top: var(--mouse-y, -250px); 
            left: var(--mouse-x, -250px);
            transform: translate(-50%, -50%);
            background: radial-gradient(circle, var(--tokopedia-green-light), transparent 60%);
            filter: blur(20px);
            opacity: 0;
            transition: opacity 0.4s;
            z-index: 1;
        }
        .info-panel:hover::before {
            opacity: 0.5;
        }
        .info-panel-content {
            width: 100%;
            height: 100%;
            background-color: var(--tokopedia-green);
            color: var(--white);
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            z-index: 2;
        }
        .info-panel-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23FFFFFF' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.5;
        }
        .info-text { position: relative; z-index: 3; }
        .info-text .logo { max-width: 200px; height: auto; margin-bottom: 2.5rem; display: block; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2)); }
        .info-text h1 { font-size: 3rem; font-weight: 800; line-height: 1.3; margin-bottom: 2rem; }
        .info-text .project-info { font-size: 1rem; line-height: 1.8; border-left: 3px solid var(--white); padding-left: 1.5rem; opacity: 0.9; }
        .form-panel {
            flex: 1;
            padding: 60px 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--card-color);
        }
        .form-content { width: 100%; max-width: 400px; }
        .form-content h1 { font-size: 2.5rem; font-weight: 800; margin-bottom: 25px; text-align: center; }
        .form-group { text-align: left; margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-size: 0.9rem; font-weight: 600; color: var(--text-muted); }
        input { width: 100%; padding: 14px; background-color: #F9FAFB; border: 1px solid var(--border-color); border-radius: 8px; color: var(--text-dark); font-family: 'Nunito', sans-serif; font-size: 1rem; transition: all 0.2s; }
        input:focus { outline: none; border-color: var(--tokopedia-green); box-shadow: 0 0 0 3px rgba(79, 157, 77, 0.2); }
        .password-wrapper { position: relative; }
        #toggle-password { position: absolute; top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer; color: var(--text-muted); }
        .login-button { width: 100%; padding: 15px; background-color: var(--tokopedia-green); border: none; border-radius: 8px; color: var(--white); font-size: 1.1rem; font-weight: 700; cursor: pointer; transition: background-color 0.2s; margin-top: 10px; }
        .login-button:hover { background-color: #418240; }
        .form-footer {
            text-align: center;
            margin-top: 25px;
            font-size: 0.9rem;
            color: var(--text-muted);
        }
        .form-footer a {
            color: var(--tokopedia-green);
            font-weight: 700;
            text-decoration: none;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <main class="auth-container">
        
        <section class="info-panel">
            <div class="info-panel-content">
                <div class="info-text">
                    <img src="{{ asset('images/Tokopedia_Mascot.png') }}" alt="Tokopedia Logo" class="logo">
                    <h1>Mulai Petualanganmu!</h1>
                    <div class="project-info">
                        Daftarkan akunmu dan nikmati jutaan produk terbaik di TokoClone.
                    </div>
                </div>
            </div>
        </section>

        <section class="form-panel">
            <div class="form-content">
                <h1>Buat Akun Baru</h1>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" required>
                            <i class="fa-solid fa-eye" id="toggle-password"></i>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div style="color: red; text-align: left; margin-bottom: 1rem; font-size: 0.9rem;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="submit" class="login-button">Daftar</button>
                </form>
                <div class="form-footer">
                    <p>Sudah punya akun? <a href="{{ route('register') }}">Masuk di sini</a></p>
                </div>
            </div>
        </section>

    </main>

    <script>
        const infoPanel = document.querySelector('.info-panel');
        if(infoPanel) {
            infoPanel.addEventListener('mousemove', (e) => {
                const rect = infoPanel.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                infoPanel.style.setProperty('--mouse-x', `${x}px`);
                infoPanel.style.setProperty('--mouse-y', `${y}px`);
            });
        }

        const togglePassword = document.querySelector('#toggle-password');
        const password = document.querySelector('#password');
        if (togglePassword) {
            togglePassword.addEventListener('click', function () {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });
        }
    </script>
</body>
</html>