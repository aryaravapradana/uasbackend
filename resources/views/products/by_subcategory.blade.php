@extends('layouts.app')

    @section('content')
    <main style="max-width: 1200px; margin: auto; padding: 2rem;">
        <a href="{{ url()->previous() }}" 
    style="display: inline-block; margin-bottom: 1rem; background-color: #f3f4f6; color: #374151; padding: 0.5rem 1rem; border-radius: 6px; font-size: 0.875rem; text-decoration: none; transition: background 0.3s;"
    onmouseover="this.style.backgroundColor='#e5e7eb'"
    onmouseout="this.style.backgroundColor='#f3f4f6'">
        Kembali 
    </a>
    <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">
        {{ $subcategory->name }}
    </h2>
    @if ($products->count())
        <div class="product-grid">
            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    <div class="product-info">
                        <h3>{{ $product->name }}</h3>
                        <p class="price">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                        <p class="meta">
                            {{ $product->subcategory->category->name ?? '-' }} / {{ $product->subcategory->name }}
                        </p>
                        <p class="stock">
                            Stok: {{ $product->stock }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top: 2rem;">
            {{ $products->links() }}
        </div>
    @else
        <div style="padding: 2rem; background: #f3f4f6; text-align: center; border-radius: 8px;">
            Tidak ada produk untuk subkategori ini.
        </div>
    @endif
</main>
@endsection
