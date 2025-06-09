<!-- Navigation Links -->
<div class="flex space-x-8 sm:-my-px sm:ms-10">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>

    <!-- FORM SEARCH PRODUK -->
    <form action="{{ route('products.search') }}" method="GET" class="flex items-center">
        <input type="text" name="q" placeholder="Cari produk..."
            class="border rounded px-2 py-1 text-sm text-black bg-white" required>
        <button type="submit" class="ml-2 bg-green-600 text-white px-3 py-1 rounded text-sm">Cari</button>
    </form>
</div>
