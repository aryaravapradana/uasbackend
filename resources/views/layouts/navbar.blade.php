<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

        {{-- KIRI: Logo & Dropdown --}}
        <div class="flex items-center gap-6">
            {{-- Logo --}}
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-8">
            </a>

            {{-- Dropdown Kategori --}}
            <div class="relative">
                <div onclick="document.querySelector('.kategori-dropdown').classList.toggle('hidden')"
                     class="cursor-pointer text-sm font-semibold text-gray-800 hover:text-green-600">
                    Kate
                </div>
                <div class="kategori-dropdown hidden absolute bg-white border shadow-lg mt-2 w-64 z-50 max-h-80 overflow-y-auto">
                    @foreach ($categories as $kategori)
                        <div class="p-3 border-b">
                            <div class="font-bold text-sm text-gray-700 mb-1">{{ $kategori->name }}</div>
                            <ul class="ml-4 list-disc text-sm text-gray-600 space-y-1">
                                @foreach ($kategori->subcategories as $sub)
                                    <li>
                                        <a href="{{ url('/kategori/' . $sub->slug) }}" class="hover:text-green-600">
                                            {{ $sub->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- TENGAH: Search --}}
        <form action="{{ route('products.search') }}" method="GET" class="flex flex-1 justify-center max-w-xl mx-6">
            <input type="text" name="q" placeholder="Cari di TokoClone..."
                   class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring focus:ring-green-500">
            <button type="submit" class="bg-green-600 px-4 py-2 rounded-r-md text-white hover:bg-green-700">
                🔍
            </button>
        </form>

        {{-- KANAN: User Info --}}
        <div class="flex items-center gap-4 text-sm">
            <a href="{{ route('order.history') }}" class="text-gray-600 hover:text-green-600">Riwayat Pesanan</a>
            <span class="font-medium text-gray-800">{{ Auth::user()->name }}</span>
            <a href="{{ route('logout') }}" class="text-gray-500 hover:text-red-600">Logout</a>
        </div>
    </div>
</header>
