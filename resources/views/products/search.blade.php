@extends('layouts.app')

@section('content')
<main style="max-width: 1200px; margin: auto; padding: 2rem;">

    {{-- Tombol Kembali ke Beranda --}}
    <a href="{{ route('home') }}"
       style="display: inline-flex; align-items: center; gap: 8px; margin-bottom: 2rem; padding: 0.6rem 1.2rem; background-color: #f3f4f6; color: #1f2937; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.875rem; font-weight: 500; text-decoration: none; box-shadow: 0 2px 6px rgba(0,0,0,0.05); transition: all 0.2s ease;"
       onmouseover="this.style.backgroundColor='#e5e7eb'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'"
       onmouseout="this.style.backgroundColor='#f3f4f6'; this.style.boxShadow='0 2px 6px rgba(0,0,0,0.05)'">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H3.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 1 1 .708.708L3.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
        </svg>
        Kembali ke Beranda
    </a>

    {{-- Judul Halaman --}}
    <h2 style="font-size: 1.75rem; font-weight: bold; margin-bottom: 0.5rem; color: #111827;">
        Hasil Pencarian
    </h2>
    <p style="font-size: 1rem; color: #6b7280; margin-bottom: 2rem;">
        Menampilkan hasil untuk: <strong>"{{ $query }}"</strong>
    </p>

    {{-- Hasil Produk --}}
    @if ($products->count())
        <div class="product-grid">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="product-card">
                        <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}">

                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>
                            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="meta">
                                {{ $product->subcategory->category->name ?? '-' }} /
                                {{ $product->subcategory->name }}
                            </p>
                            <p class="stock">Stok: {{ $product->stock }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div style="padding: 2rem; background: #f3f4f6; text-align: center; border-radius: 8px; color: #6b7280;">
            Tidak ada produk yang cocok dengan pencarian ini.
        </div>
    @endif
</main>
@endsection
