@extends('layouts.app')

@section('content')
<div style="max-width: 1000px; margin: 2rem auto 1rem auto; padding-left: 0.5rem;">
    <a href="{{ url()->previous() }}"
       style="display: inline-flex; align-items: center; gap: 8px;
              padding: 0.6rem 1.2rem; background-color: #f9fafb;
              color: #1f2937; border: 1px solid #d1d5db;
              border-radius: 8px; font-size: 0.875rem;
              font-weight: 500; text-decoration: none;
              box-shadow: 0 2px 5px rgba(0,0,0,0.05);
              transition: all 0.3s ease;"
       onmouseover="this.style.backgroundColor='#e5e7eb'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'"
       onmouseout="this.style.backgroundColor='#f9fafb'; this.style.boxShadow='0 2px 5px rgba(0,0,0,0.05)'">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
             viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M15 8a.5.5 0 0 1-.5.5H3.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 1 1 .708.708L3.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
        </svg>
        Kembali
    </a>
</div>




<main style="max-width: 1000px; margin: 2rem auto; padding: 1rem;">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        {{-- Gambar Produk --}}
        <div>
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" style="width: 100%; border-radius: 10px;">
        </div>
        
        {{-- Detail Produk --}}
        <div>
            <h1 style="font-size: 1.8rem; font-weight: bold;">{{ $product->name }}</h1>
            <p style="font-size: 1.5rem; color: #16a34a; margin: 0.5rem 0;">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </p>
            <p style="margin-bottom: 1rem;">Stok: {{ $product->stock }}</p>
            <p style="margin-bottom: 1rem; color: #6b7280;">
                {{ $product->subcategory->category->name ?? '-' }} / {{ $product->subcategory->name }}
            </p>
            <p style="margin-bottom: 1rem; color: #6b7280;">
                Ditambahkan pada: {{ $product->created_at->format('d M Y') }}
            </p>
            <h3 style="font-weight: 600; margin-bottom: 0.25rem;">Deskripsi</h3>
            <p style="line-height: 1.6; color: #444;">{{ $product->description }}</p>

            <form action="{{ route('cart.store') }}" method="POST" style="margin-top: 2rem;">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" style="width: 70px; padding: 0.4rem; margin-right: 1rem;">

                <button type="submit" style="padding: 0.6rem 1.5rem; background-color: #16a34a; color: white; border: none; border-radius: 5px; font-weight: 600; cursor: pointer;">
                    + Tambah ke Keranjang
                </button>
            </form>
        </div>
    </div>
</main>
@endsection
