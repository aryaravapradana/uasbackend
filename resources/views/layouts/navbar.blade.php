<!-- Navigation Links -->
<div class="flex space-x-8 sm:-my-px sm:ms-10">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>

    <div class="flex items-center px-6 py-2 bg-white shadow">
    <img src="/logo.png" class="w-10 h-10">
    
    <form class="ml-4 flex">
        <input type="text" class="rounded-l px-4 py-2 w-96" placeholder="Cari di TokoClone">
        <button class="bg-green-500 px-4 rounded-r text-white">🔍</button>
    </form>
</div>

    <!-- FORM SEARCH PRODUK -->
    <form action="{{ route('products.search') }}" method="GET" class="flex items-center">
        <input type="text" name="q" placeholder="Cari produk..."
            class="border rounded px-2 py-1 text-sm text-black bg-white" required>
        <button type="submit" class="ml-2 bg-green-600 text-white px-3 py-1 rounded text-sm">Cari</button>
    </form>

</div>
