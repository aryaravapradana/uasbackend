@extends('layouts.app')

@section('content')
<main class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-red-600 text-3xl">INI FILE BY_CATEGORIES YANG DIEDIT</h1>

    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-8">
        Produk dalam Subkategori: {{ $subcategory->name }}
    </h2>

    @if ($products->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden">
                    <div class="bg-gray-100 w-full h-48 flex items-center justify-center">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="object-cover h-full w-full">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 truncate">{{ $product->name }}</h3>
                        <p class="text-green-600 font-bold text-md mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ $product->subcategory->category->name ?? '-' }} / {{ $product->subcategory->name }}
                        </p>
                        <p class="text-sm text-gray-700 mt-1">
                            <span class="font-semibold">Stok:</span> {{ $product->stock }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $products->links() }}
        </div>
    @else
        <div class="text-gray-500 bg-white p-6 rounded-lg shadow text-center">
            Tidak ada produk untuk subkategori ini.
        </div>
    @endif
</main>
@endsection
