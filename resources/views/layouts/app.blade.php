<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TokoClone') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/product-card.css') }}?v={{ time() }}">

    <!-- FontAwesome Icon (for search icon) -->
    <script src="https://kit.fontawesome.com/1dcfadc155.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white">
    <div class="min-h-screen bg-white">

        <header style="background-color:rgb(255, 255, 255); padding: 1rem 0; box-shadow: 0 4px 10px rgba(0,0,0,0.08);">
    <div style="max-width: 1200px; margin: auto; display: flex; align-items: center; justify-content: space-between; padding: 0 2rem; gap: 2rem;">

        {{-- Logo --}}
        <div style="flex-shrink: 0; font-size: 1.4rem; font-weight: bold;">
            <a href="{{ route('home') }}" style="color: black; text-decoration: none;">TokoClone</a>
        </div>

        {{-- Search Bar --}}
      

        {{-- Avatar + Nama User --}}
    @auth
    <div style="display: flex; align-items: center; gap: 0.75rem; cursor: pointer;
                font-family: 'figtree', sans-serif; font-weight: 500; font-size: 0.95rem; color: #1f2937;"
        onclick="document.getElementById('user-dropdown').classList.toggle('show')"
        onmouseover="this.querySelector('.avatar').style.backgroundColor='#059669'; this.querySelector('.avatar').style.color='white'; this.querySelector('.username').style.color='#059669';"
        onmouseout="this.querySelector('.avatar').style.backgroundColor='#e5e7eb'; this.querySelector('.avatar').style.color='#1f2937'; this.querySelector('.username').style.color='#1f2937';"
    >
        {{-- Avatar Inisial --}}
        <div class="avatar" style="
            width: 38px;
            height: 38px;
            background-color: #e5e7eb;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        ">
             {{ Auth::user()->initial }}

        </div>

        {{-- Nama --}}
        <span class="username" style="transition: color 0.2s ease;">
            {{ Auth::user()->name }}
        </span>
    </div>
    @else
    <a href="{{ route('login') }}" style="
        color: #1f2937;
        text-decoration: none;
        font-family: 'figtree', sans-serif;
        font-weight: 500;
        transition: color 0.2s ease;"
        onmouseover="this.style.color='#059669'"
        onmouseout="this.style.color='#1f2937'"
    >
        Login
    </a>
    @endauth
    </header>
        {{-- === MAIN CONTENT === --}}
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
